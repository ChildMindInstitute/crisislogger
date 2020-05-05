import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import WordCloudComponent from "./WordCloudComponent";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import Col from "react-bootstrap/Col";
import Row from "react-bootstrap/Row";
import Alert from "react-bootstrap/Alert";
import ReactPlayer from 'react-player'
import AxiosClient from "../utills/AxiosClient";
import Utils from "../utills/Utill";
import Spinner from 'react-bootstrap/Spinner'
import Modal from 'react-bootstrap/Modal'
const APIinterface = new AxiosClient();
class App extends Component {
    constructor() {
        super()
        this.state = {
            searchTrans: '',
            searchText: '',
            playing: false,
            transLoading: false,
            textLoading: false,
            transData: [],
            textData: [],
            error: false,
            trans_last_page: 0,
            trans_currentPage: 0,
            text_currentPage: 0,
            text_last_page: 0,
            selectedText: '',
            showTextModal: false,
        };
        this.changePlayState = this.changePlayState.bind()
    }

    componentDidMount() {
        this.getTranscriptions(1, this.state.searchTrans);
        let self = this
        setTimeout(function () {
            self.getTexts(1, self.state.searchText);
        }, 500)
    }
    getTranscriptions(page, searchTxt)
    {
        this.setState({transLoading: true})
        APIinterface.session.get('api/user-transcription', {
            params: { page: page, searchTxt: searchTxt}
        })
            .then(response => {
                let responseData = response.data;
                let dataList = [];
                responseData.data.forEach(element => {
                    if(element.transcript !== undefined && element.transcript !== null )
                    {
                        element.words = Utils.getWords(element.transcript.text);
                    }
                    else {
                        element.words = []
                    }
                    dataList.push(element);
                });
                responseData.data = dataList;
                this.setState({
                    transData: responseData.data,
                    trans_currentPage: responseData.current_page,
                    trans_last_page: responseData.last_page,
                    transLoading: false
                })
            })
            .catch((error) => {
                console.log(error)
                this.setState({error: true, loading: false})
            });
    }
    getTexts(page, searchText)
    {
        this.setState({textLoading: true})
        APIinterface.session.get('api/user-texts', {
            params: { page: page, searchTxt: searchText}
        })
            .then(response => {
                let responseData = response.data;
                let dataList = [];
                responseData.data.forEach(element => {
                    element.words = Utils.getWords(element.text);
                    dataList.push(element);
                });
                responseData.data = dataList;
                this.setState({
                    textData: responseData.data,
                    text_currentPage: responseData.current_page,
                    text_last_page: responseData.last_page,
                    textLoading: false
                })
            })
            .catch((error) => {
                this.setState({error: true, loading: false})
            });
    }
    changePlayState() {
        this.setState({playing: false})
    }

    render() {
        const { transData,textData, error, transLoading, textLoading} = this.state;
        return (
            <div className="row">
                <div className="justify-content-center" style={{width: '100%', marginTop: 40}}>
                    <div style={{display: 'flex', flex: 1, flexWrap: 'wrap', justifyContent: 'center'}}>
                        <div>
                            {
                                transLoading && <Spinner animation="border"/>
                            }
                        </div>
                    </div>
                    {
                        error?
                            <Alert color="warning">
                                {'Something went wrong, please reload the page again'}
                            </Alert>
                            : null
                    }
                    <h3>Uploads: </h3>
                    <Row >

                        {transData.length ? transData.map((value, index) => {
                                let isVideo = value.name.split(".")[1] === 'webm' || value.name.split(".")[1] === 'mkv' || value.name.split(".")[1] === 'mp4';
                                let videoExtension = value.name.split(".")[1];
                                return (
                                    <Col xs={12} sm={6} md={4} lg={3} xl={3} style={{marginTop: 20}} key={index}>
                                        <div style={{
                                            borderRadius: 14,
                                            overflow: 'hidden',
                                            backgroundColor: '#fafafa',
                                            boxShadow: '0px 0px 1px 0px rgba(0,0,0,0.35)',
                                        }}>
                                            {
                                                value.transcript !== undefined && value.transcript !== null &&
                                                <WordCloudComponent text={value.transcript.text} words={value.words}/>
                                            }
                                            <div style={{flexGrow: 1}}/>
                                            {isVideo ?
                                                <ReactPlayer
                                                    width={'100%'}
                                                    height={205}
                                                    style={{margin: 0}}
                                                    controls={true}
                                                    muted={false}
                                                    url={[
                                                        {
                                                            src: "https://storage.googleapis.com/crisislogger_uploads/" + value.name,
                                                            type: 'video/' + videoExtension
                                                        },
                                                    ]}
                                                />
                                                :
                                                <div>
                                                    <ReactPlayer height={50} width={'100%'}
                                                                 url={"https://storage.googleapis.com/crisislogger_uploads/" + value.name}
                                                                 controls={true}/>
                                                </div>
                                            }
                                            <div style={{display: 'flex',padding: 8, fontSize:14, justifyContent: 'space-between', marginTop: 5, marginBottom: 5}}>
                                            <span >
                                                 <Form.Check
                                                     type={'checkbox'}
                                                     checked={value.contribute_to_science}
                                                     onChange={(e)=>this.shareResource(index, value.id, 'upload','contribute', e.target.checked)}
                                                     id={`default-${value.id}-share`}
                                                     label={`Science`}
                                                 />
                                            </span>
                                                <span>
                                                 <Form.Check
                                                     type={'checkbox'}
                                                     checked={value.share}
                                                     onChange={(e)=>this.shareResource(index, value.id, 'upload','public',  e.target.checked)}
                                                     id={`default-${value.id}-public`}
                                                     label={`Public`}
                                                 />
                                            </span>
                                                <span
                                                    style={{cursor: 'pointer'}}
                                                    onClick={()=> this.removeResource(index,'upload', value.id)}
                                                >
                                                <i className="fa fa-trash"> </i> Delete
                                            </span>
                                            </div>
                                        </div>
                                    </Col>
                                )
                            })
                            :
                            !transLoading &&
                            <div style={{display: 'flex', flex: 1, flexWrap: 'wrap', justifyContent: 'center', padding: 20, background: '#fff', borderRadius: 14}}>
                                <p>No uploads are found</p>
                            </div>
                        }
                    </Row>
                        {
                            !transLoading ?
                                <div style={{display: 'flex', flex: 1, alignItems: 'center', justifyContent: 'center', marginTop: 40}}>

                                    <div onClick={() => this.previousPage('trans')} style={{backgroundColor: '#6e6e6e', width: 35, height: 35, borderRadius: 35, cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center',}}>
                                        <i className="fa fa-arrow-left"></i>
                                    </div>
                                    <div style={{marginRight: 30, marginLeft: 30}}>{this.state.trans_currentPage} of {this.state.trans_last_page}</div>
                                    <div onClick={() => this.nextPage('trans')} style={{backgroundColor: '#6e6e6e', width: 35, height: 35, borderRadius: 35, cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center',}}>
                                        <i className="fa fa-arrow-right"></i>
                                    </div>
                                </div> :
                                null
                        }
                    </div>
                    <div className="justify-content-center" style={{width: '100%', margin: '50px auto'}}>
                        <div style={{display: 'flex', flex: 1, flexWrap: 'wrap', justifyContent: 'center'}}>
                            <div>
                                {
                                    textLoading && <Spinner animation="border"/>
                                }
                            </div>
                        </div>
                        {
                            error?
                                <Alert color="warning">
                                    {'Something went wrong, please reload the page again'}
                                </Alert>
                                : null
                        }
                    <h3>Texts: </h3>
                    <Row>
                         { textData.length ?
                             textData.map((value, index) => {
                                return (
                                    <Col xs={12} sm={6} md={4} lg={3} xl={3} style={{marginTop: 20}} key={index}>
                                        <div
                                            style={{
                                                overflow: 'hidden',
                                                backgroundColor: '#fafafa',
                                                boxShadow: '0px 0px 1px 0px rgba(0,0,0,0.35)',
                                            }}
                                        >
                                            <p className="text-justify text-ellipsis" onClick={() => this.showText(value.text)}>{value.text}</p>
                                            <div style={{display: 'flex',
                                                fontSize: 14,
                                                justifyContent: 'space-between',
                                                marginTop: 5,
                                                padding: 8,
                                                marginBottom: 5}}>
                                                <span >
                                                     <Form.Check
                                                         type={'checkbox'}
                                                         id={`default--text-${value.id}-share`}
                                                         checked={value.contribute_to_science}
                                                         onChange={(e)=>this.shareResource(index, value.id, 'text','contribute', e.target.checked)}
                                                         label={`Science`}
                                                     />
                                                </span>
                                                    <span>
                                                     <Form.Check
                                                         type={'checkbox'}
                                                         id={`default--text-${value.id}-share`}
                                                         checked={value.share}
                                                         onChange={(e)=>this.shareResource(index, value.id, 'text','public',  e.target.checked)}
                                                         label={`Public`}
                                                     />
                                                </span>
                                                <span
                                                    style={{cursor: 'pointer'}}
                                                    onClick={()=> this.removeResource(index,'text', value.id)}
                                                >
                                                    <i className="fa fa-trash"> </i> Delete
                                                </span>
                                            </div>
                                        </div>
                                    </Col>
                                )
                            })
                         :
                             !textLoading &&
                             <div style={{display: 'flex', flex: 1, flexWrap: 'wrap', justifyContent: 'center', padding: 20, background: '#fff', borderRadius: 14}}>
                                 <p>No texts are found</p>
                             </div>
                         }
                    </Row>
                    {
                        !textLoading ?
                        <div style={{display: 'flex', flex: 1, alignItems: 'center', justifyContent: 'center', marginTop: 40}}>

                            <div onClick={() => this.previousPage('trans')} style={{backgroundColor: '#6e6e6e', width: 35, height: 35, borderRadius: 35, cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center',}}>
                                <i className="fa fa-arrow-left"></i>
                            </div>
                            <div style={{marginRight: 30, marginLeft: 30}}>{this.state.text_currentPage} of {this.state.text_last_page}</div>
                            <div onClick={() => this.nextPage('trans')} style={{backgroundColor: '#6e6e6e', width: 35, height: 35, borderRadius: 35, cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center',}}>
                                <i className="fa fa-arrow-right"></i>
                            </div>
                        </div> :
                        null
                    }
                </div>
                {
                    this.renderModal()
                }
            </div>
        );
    }
    renderModal()
    {
        return (
            <Modal show={this.state.showTextModal} onHide={() => this.closeModal()}>
                <Modal.Header closeButton></Modal.Header>
                <Modal.Body>{this.state.selectedText}</Modal.Body>
                <Modal.Footer>
                    <Button variant="secondary" onClick={() =>this.closeModal()}>
                        Close
                    </Button>
                </Modal.Footer>
            </Modal>
        )
    }
    closeModal()
    {
        this.setState({showTextModal: false})
    }
    removeResource(index, type, id)
    {
        swal.fire({
            text: 'Are you sure you want to delete this?',
            confirmButtonText: 'Yes',
            showCancelButton: true,
            cancelButtonText:  'Cancel',
        })
            .then(result => {
                if (result.value) {
                    APIinterface.session.delete('/api/remove-resource', {
                        data: { id: id, type: type}
                    })
                        .then(({data}) => {
                            swal.fire({
                                type: 'success',
                                text: "Successfully deleted"
                            });
                            if (type === 'upload')
                            {
                                let transData = this.state.transData;
                                this.setState({transData: transData.filter(el => el.id !== id)})
                            }
                            else {
                                let textData = this.state.textData;
                                this.setState({textData: textData.filter(el => el.id !== id)})
                            }
                        })
                        .catch(error => {
                            swal.fire({
                                type: 'error',
                                text: "Something went wrong, please try again later"
                            })
                        })
                }
            });
    }
    shareResource(index, id, type, resourceType, value)
    {
        if (value)
        {
            swal.fire({
                title: (resourceType ==='contribute'? 'Are you sure you want to contribute this for science?': 'Are you sure you want to share this publicly?'),
                text: (resourceType === 'contribute'?' If Yes, you are only giving permission for (1) your data to be stored by our team, and (2) to be contacted before its use in future research.':
                    'If Public, the Child Mind Institute and its partners may share your text or recording through their websites and social media channels. If Private, your story will not be publicly shared in any form.'),
                showCancelButton: true,
                confirmButtonText:  resourceType === 'contribute' ? 'Contribute to science' : 'Public',
                cancelButtonText:  resourceType === 'contribute' ? 'Do not contribute' : 'Private',
            })
                .then(result => {
                    if (result.value)
                    {
                        const data =  { id: id, type: type, status:  1, contentType: resourceType};
                        APIinterface.session.put('/api/update-resource-status', data)
                            .then(({data}) => {
                                swal.fire({
                                    type: 'success',
                                    text: "Successfully updated"
                                });
                                if (type === 'upload')
                                {
                                    let transData = this.state.transData;
                                    let selectedTransData = transData[index]
                                    if (resourceType ==='contribute')
                                    {
                                        selectedTransData.contribute_to_science = value;
                                    }
                                    else {
                                        selectedTransData.share = value;
                                    }
                                    transData[index] = selectedTransData;
                                    this.setState({transData: transData})
                                }
                                else {
                                    let textData = this.state.textData;
                                    let selectedData = textData[index]
                                    if (resourceType ==='contribute')
                                    {
                                        selectedData.contribute_to_science = value;
                                    }
                                    else {
                                        selectedData.share = value;
                                    }
                                    textData[index] = selectedData;
                                    this.setState({textData: textData})
                                }

                            })
                            .catch(error => {
                                swal.fire({
                                    type: 'error',
                                    text: "Something went wrong, please try again later"
                                })
                            })
                    }
                })
        }
        else {
            swal.fire({
                title: (resourceType ==='contribute'? 'Are you sure you do not want to contribute this for science? ': 'Are you sure you want to make this private?'),
                text: (resourceType ==='contribute'? 'Contributing to science means that you are only giving permission for (1) your data to be stored by our team, and (2) to be contacted before its use in future research.':
                    'If Public, the Child Mind Institute and its partners may share your text or recording through their websites and social media channels. If Private, your story will not be publicly shared in any form.'),
                confirmButtonText:  resourceType === 'contribute' ? 'Do not contribute' : 'Private',
                showCancelButton: true,
                cancelButtonText:  resourceType === 'contribute' ? 'Contribute to science' : 'Public',
            })
                .then(result => {
                    if (result.value)
                    {
                        const data =  { id: id, type: type, status:  0, contentType: resourceType};
                        APIinterface.session.put('/api/update-resource-status', data)
                            .then(({data}) => {
                                swal.fire({
                                    type: 'success',
                                    text: "Successfully updated"
                                })
                                if (type === 'upload')
                                {
                                    let transData = this.state.transData;
                                    let selectedTransData = transData[index]
                                    if (resourceType ==='contribute')
                                    {
                                        selectedTransData.contribute_to_science = value;
                                    }
                                    else {
                                        selectedTransData.share = value;
                                    }
                                    transData[index] = selectedTransData;
                                    this.setState({transData: transData})
                                }
                                else {
                                    let textData = this.state.textData;
                                    let selectedData = textData[index]
                                    if (resourceType ==='contribute')
                                    {
                                        selectedData.contribute_to_science = value;
                                    }
                                    else {
                                        selectedData.share = value;
                                    }
                                    textData[index] = selectedData;
                                    this.setState({textData: textData})
                                }
                            })
                            .catch(error => {
                                swal.fire({
                                    type: 'error',
                                    text: "Something went wrong, please try again later"
                                })
                            })
                    }
                })
        }
    }
    nextPage(type) {
        if (type ==='trans') {
            if (this.state.trans_currentPage < this.state.trans_last_page) {
                this.getTranscriptions(this.state.trans_currentPage + 1, this.state.searchTrans);
            }
        }
        else {
            if (this.state.text_currentPage < this.state.text_last_page) {
                this.getTexts(this.state.text_currentPage + 1, this.state.searchTxt);
            }
        }
    }
    showText(text) {
       this.setState({selectedText: text, showTextModal: true})
    }
    previousPage(type) {
        if (type ==='trans')
        {
            if (this.state.trans_currentPage > 1) {
                this.getTranscriptions(this.state.trans_currentPage - 1, this.state.searchTrans);
            }
        }
        else {
            if (this.state.trans_currentPage > 1) {
                this.getTexts(this.state.text_currentPage - 1, this.state.searchTxt);
            }
        }

    }


    search() {
        if(!this.state.searchTxt.length)
        {
            return true;
        }
        this.getTranscriptions(1, this.state.searchTxt);
    }


}
export default App;

if (document.getElementById('dashboard_gallery')) {
    ReactDOM.render(<App />, document.getElementById('dashboard_gallery'));
}
