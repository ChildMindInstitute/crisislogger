import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import WordCloudComponent from "./WordCloudComponent";
import InputGroup from "react-bootstrap/InputGroup";
import FormControl from "react-bootstrap/FormControl";
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
                    <Row>

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
                                        </div>
                                    </Col>
                                )
                            })
                            :
                            !transLoading &&
                            <div style={{display: 'flex', flex: 1, flexWrap: 'wrap', justifyContent: 'center'}}>
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
                                        <div className={'kt-portlet text-content'}>
                                            <p className="text-justify text-ellipsis" onClick={() => this.showText(value.text)}>{value.text}</p>
                                        </div>
                                    </Col>
                                )
                            })
                         :
                             !textLoading &&
                             <div style={{display: 'flex', flex: 1, flexWrap: 'wrap', justifyContent: 'center'}}>
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
