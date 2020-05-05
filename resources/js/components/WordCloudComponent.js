import React, {Component} from 'react';
import ReactWordcloud from "react-wordcloud";
import Modal from 'react-bootstrap/Modal'
import Button from 'react-bootstrap/Button'
const TEXT_COLLAPSE_OPTIONS = {
    collapse: false, // default state when component rendered
    collapseText: '... show more', // text to show when collapsed
    expandText: 'show less', // text to show when expanded
    minHeight: 195, // component height when closed
    maxHeight: 340, // expanded to
    textStyle: { // pass the css for the collapseText and expandText here
        color: "#333",
        fontSize: "14px",
        marginLeft: "9px",
    }
};

const options = {
    colors: ['#6e6e6e'],
    enableTooltip: false,
    deterministic: true,
    fontStyle: 'normal',
    fontWeight: 'normal',
    fontSizes: [15, 30],
    padding: 1,
    rotations: 3,
    rotationAngles: [0],
    scale: 'sqrt',
    spiral: 'archimedean',
    transitionDuration: 1000,
};


class WordCloudComponent extends Component {

    constructor(props) {
        super(props);
        this.state = {
            showWordCloud: true,
            open: false,
        };
    }


    render() {
        return (
            <div style={{padding: 17, paddingBottom: 0}}>
                <div style={{maxHeight: 210, minHeight:210, overflow: "hidden"}}>
                    {this.state.showWordCloud ?
                        <div style={{height: 210, width: '100%'}}>
                            <ReactWordcloud
                                options={options}
                                words={this.props.words}
                                maxWords={20}
                            />
                        </div>
                        :
                        <div>
                            <p style={{fontSize: 14, color: '#6e6e6e', fontFamily: 'sans-serif', textAlign: 'left', lineHeight: 1.1}}>
                                {this.props.text}
                            </p>
                        </div>
                    }
                </div>


                <div style={{display: 'flex', justifyContent: 'space-between', marginTop: 5, marginBottom: 5}}>
					<span
                        onClick={() => this.openModal()}
                        style={{fontSize: 14, cursor: 'pointer', color: '#6e6e6e', fontFamily: 'sans-serif',}}
                    >
						show more
					</span>
                    <span
                        onClick={() => this.toggleShowWordCloud()}
                        style={{fontSize: 14, cursor: 'pointer', color: '#6e6e6e', fontFamily: 'sans-serif',}}
                    >
                        <i className="fa fa-cloud"></i>
                    </span>
                </div>

                <Modal show={this.state.open} onHide={() => this.closeModal()}>
                    <Modal.Header closeButton></Modal.Header>
                    <Modal.Body>{this.props.text}</Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={() =>this.closeModal()}>
                            Close
                        </Button>
                    </Modal.Footer>
                </Modal>
            </div>
        );
    }

    toggleShowWordCloud() {
        this.setState({
            showWordCloud: !this.state.showWordCloud,
        })
    }


    openModal() {
        this.setState({
            open: true,
        })
    }

    closeModal() {
        this.setState({
            open: false,
        })
    }

}

export default WordCloudComponent;
