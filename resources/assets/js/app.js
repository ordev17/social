/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

import * as utils from './libs/utils.js'
import pModel from './model_pca_20_svm.js'
import d3 from './libs/d3.min.js'
import * as clm from './clmtrackr.js'
//import * as Stats from './libs/Stats.js'
//import * as emotionModel from './emotionmodel.js'

var Stats=function(){var h,a,n=0,o=0,i=Date.now(),u=i,p=i,l=0,q=1E3,r=0,e,j,f,b=[[16,16,48],[0,255,255]],m=0,s=1E3,t=0,d,k,g,c=[[16,48,16],[0,255,0]];h=document.createElement("div");h.style.cursor="pointer";h.style.width="80px";h.style.opacity="0.9";h.style.zIndex="10001";h.addEventListener("mousedown",function(a){a.preventDefault();n=(n+1)%2;n==0?(e.style.display="block",d.style.display="none"):(e.style.display="none",d.style.display="block")},!1);e=document.createElement("div");e.style.textAlign=
    "left";e.style.lineHeight="1.2em";e.style.backgroundColor="rgb("+Math.floor(b[0][0]/2)+","+Math.floor(b[0][1]/2)+","+Math.floor(b[0][2]/2)+")";e.style.padding="0 0 3px 3px";h.appendChild(e);j=document.createElement("div");j.style.fontFamily="Helvetica, Arial, sans-serif";j.style.fontSize="9px";j.style.color="rgb("+b[1][0]+","+b[1][1]+","+b[1][2]+")";j.style.fontWeight="bold";j.innerHTML="FPS";e.appendChild(j);f=document.createElement("div");f.style.position="relative";f.style.width="74px";f.style.height=
    "30px";f.style.backgroundColor="rgb("+b[1][0]+","+b[1][1]+","+b[1][2]+")";for(e.appendChild(f);f.children.length<74;)a=document.createElement("span"),a.style.width="1px",a.style.height="30px",a.style.cssFloat="left",a.style.backgroundColor="rgb("+b[0][0]+","+b[0][1]+","+b[0][2]+")",f.appendChild(a);d=document.createElement("div");d.style.textAlign="left";d.style.lineHeight="1.2em";d.style.backgroundColor="rgb("+Math.floor(c[0][0]/2)+","+Math.floor(c[0][1]/2)+","+Math.floor(c[0][2]/2)+")";d.style.padding=
    "0 0 3px 3px";d.style.display="none";h.appendChild(d);k=document.createElement("div");k.style.fontFamily="Helvetica, Arial, sans-serif";k.style.fontSize="9px";k.style.color="rgb("+c[1][0]+","+c[1][1]+","+c[1][2]+")";k.style.fontWeight="bold";k.innerHTML="MS";d.appendChild(k);g=document.createElement("div");g.style.position="relative";g.style.width="74px";g.style.height="30px";g.style.backgroundColor="rgb("+c[1][0]+","+c[1][1]+","+c[1][2]+")";for(d.appendChild(g);g.children.length<74;)a=document.createElement("span"),
    a.style.width="1px",a.style.height=Math.random()*30+"px",a.style.cssFloat="left",a.style.backgroundColor="rgb("+c[0][0]+","+c[0][1]+","+c[0][2]+")",g.appendChild(a);return{domElement:h,update:function(){i=Date.now();m=i-u;s=Math.min(s,m);t=Math.max(t,m);k.textContent=m+" MS ("+s+"-"+t+")";var a=Math.min(30,30-m/200*30);g.appendChild(g.firstChild).style.height=a+"px";u=i;o++;if(i>p+1E3)l=Math.round(o*1E3/(i-p)),q=Math.min(q,l),r=Math.max(r,l),j.textContent=l+" FPS ("+q+"-"+r+")",a=Math.min(30,30-l/
        100*30),f.appendChild(f.firstChild).style.height=a+"px",p=i,o=0}}};

var emotionModel = {
    "angry" : {
        "bias" : -2.3768163629,
        "coefficients" : [-0.026270300474413848, 0.037963304603547195, 0.25318394482150264, -0.36801694354709802, -0.059638621925431838, 6.3145056900010567e-17, 0.094520059272651849, 0.21347244366388901, 0.42885313652690621, -1.5592214434343613e-14, 0.13850079872874066, -5.1485910666665307e-16, 0.33298910350203975, 8.0357363919330235e-16, 0.0025325096363696059, -0.44615090964065951, -1.5784656134660036e-15, 0.047596008125675944],
    },
    "disgusted" : {
        "bias" : -2.27900176842,
        "coefficients" : [0.042360511043701296, 0.1282033922181087, 0.12391812407152457, -0.27567823277270387, 0.1421150306247343, -3.1081856766624292e-16, 0.12612972927139088, 0.23426310789552218, 0.058894842405560956, -4.0618311657856847e-15, 0.22340906131116328, -5.81584759084207e-15, 0.25735218595500009, 1.3658078149815552e-15, -0.12506850140605949, -0.9463447584787309, -4.555025133881674e-15, 0.07141679477545719],
    },
    "fear" : {
        "bias" : -3.40339917096,
        "coefficients" : [-0.1484066846778026, -0.090079860583144475, -0.16138464891003612, 0.078750143250805593, 0.070521075864349317, 3.6426173865029096e-14, 0.54106033239630258, 0.049586639890528791, -0.10793093750863458, -5.1279691693889055e-15, -0.092243236155683667, -1.5165430767377168e-14, 0.19842076279793416, 3.8282960479670228e-15, -0.67367184030514637, -0.2166709100861198, 1.1995348541944584e-14, -0.20024153378658624],
    },
    "sad" : {
        "bias" : -2.75274632938,
        "coefficients" : [0.092611010001705449, -0.12883530427748521, -0.068975994604949298, -0.19623077060801897, 0.055312197843294802, -3.5874521027522394e-16, 0.46315306348086854, -0.32103622843654361, -0.46536626891885491, 1.725612051187888e-14, -0.40841535552399683, 2.1258665882389598e-14, 0.45405204011625938, 5.9194289392226669e-15, 0.094410500655151899, -0.4861387223131064, -3.030330454831321e-15, 0.73708254653765559],
    },
    "surprised" : {
        "bias" : -2.86262062696,
        "coefficients" : [-0.12854109490879712, -0.049194392540246726, -0.22856553950573175, 0.2992140056765602, -0.25975558754705375, 1.4688408313649554e-09, -0.13685597104348368, -0.23581884244542603, 0.026447180058097462, 1.6822695398601112e-10, 0.095712304864421921, -4.4670230074132591e-10, 0.40505706085269738, 2.7821987602166784e-11, -0.54367856543588833, -0.096320945782919151, 1.4239801195516449e-10, -0.7238167998685946],
    },
    "happy" : {
        "bias" : -1.4786712822,
        "coefficients" : [0.014837209675880276, 0.31092627456808286, -0.1214238695400552, 0.45265837869400843, 0.36700140259900887, 1.7113646510738279e-15, -0.4786251427206033, -0.15377369505521801, -0.16948121903942992, 6.0300272629176253e-15, -0.021184992727875669, -6.9318606881292957e-15, -0.81611603551588852, -3.7883560238442657e-15, 0.1486320646217055, 0.94973410351769527, 3.6260400713070416e-15, -0.31361179943007411],
    },
};

var emotionClassifier = function() {

    var previousParameters = [];
    var classifier = {};
    var emotions = [];
    var coefficient_length;

    this.getEmotions = function() {
        return emotions;
    }

    this.init = function(model) {
        // load it
        for (var m in model) {
            emotions.push(m);
            classifier[m] = {};
            classifier[m]['bias'] = model[m]['bias'];
            classifier[m]['coefficients'] = model[m]['coefficients'];
        }
        coefficient_length = classifier[emotions[0]]['coefficients'].length;
    }

    this.getBlank = function() {
        var prediction = [];
        for (var j = 0;j < emotions.length;j++) {
            prediction[j] = {"emotion" : emotions[j], "value" : 0.0};
        }
        return prediction;
    }

    this.predict = function(parameters) {
        var prediction = [];
        for (var j = 0;j < emotions.length;j++) {
            var e = emotions[j];
            var score = classifier[e].bias;
            for (var i = 0;i < coefficient_length;i++) {
                score += classifier[e].coefficients[i]*parameters[i+6];
            }
            prediction[j] = {"emotion" : e, "value" : 0.0};
            prediction[j]['value'] = 1.0/(1.0 + Math.exp(-score));
        }
        return prediction;
    }

    this.meanPredict = function (parameters) {
        // store to array of 10 previous parameters
        previousParameters.splice(0, previousParameters.length == 10 ? 1 : 0);
        previousParameters.push(parameters.slice(0));

        if (previousParameters.length > 9) {
            // calculate mean of parameters?
            var meanParameters = [];
            for (var i = 0;i < parameters.length;i++) {
                meanParameters[i] = 0;
            }
            for (var i = 0;i < previousParameters.length;i++) {
                for (var j = 0;j < parameters.length;j++) {
                    meanParameters[j] += previousParameters[i][j];
                }
            }
            for (var i = 0;i < parameters.length;i++) {
                meanParameters[i] /= 10;
            }

            // calculate logistic regression
            return this.predict(meanParameters);
        } else {
            return false;
        }
    }
}

let ads = [];
let adImage = 'img/undefined.jpg';
let interest = [];

if (location.pathname === "/posts") {
    axios.get('/ads')
        .then(function (response) {
            ads = response.data;
            setInterval(function () {
                let ad = ads[Math.floor(Math.random() * ads.length)];
                setTimeout(saveInterest(ad.category_id), 3000);
                adImage = ad.url;
                document.getElementById("advertImg").src = adImage;
                $("#myModal").modal();
            }, 5000);
        })
        .catch(function (error) {
            console.log(error);
        });

    /********** START EMOTION DETECTION **********/
    var vid = document.getElementById('videoel');
    var vid_width = vid.width;
    var vid_height = vid.height;
    var overlay = document.getElementById('overlay');
    var overlayCC = overlay.getContext('2d');

    /********** check and set up video/webcam **********/

    function enablestart() {
        var startbutton = document.getElementById('startbutton');
        startbutton.value = "Show/Hide Video";
        startbutton.disabled = null;
    }

    function adjustVideoProportions() {
        // resize overlay and video if proportions are different
        // keep same height, just change width
        var proportion = vid.videoWidth/vid.videoHeight;
        vid_width = Math.round(vid_height * proportion);
        vid.width = vid_width;
        overlay.width = vid_width;
    }

    function gumSuccess( stream ) {
        // add camera stream if getUserMedia succeeded
        if ("srcObject" in vid) {
            vid.srcObject = stream;
        } else {
            vid.src = (window.URL && window.URL.createObjectURL(stream));
        }
        vid.onloadedmetadata = function() {
            adjustVideoProportions();
            vid.play();
        }
        vid.onresize = function() {
            adjustVideoProportions();
            if (trackingStarted) {
                ctrack.stop();
                ctrack.reset();
                ctrack.start(vid);
            }
        }
    }

    function gumFail() {
        alert("There was some problem trying to fetch video from your webcam. If you have a webcam, please make sure to accept when the browser asks for access to your webcam.");
    }

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL = window.URL || window.webkitURL || window.msURL || window.mozURL;

    // check for camerasupport
    if (navigator.mediaDevices) {
        navigator.mediaDevices.getUserMedia({video : true}).then(gumSuccess).catch(gumFail);
    } else if (navigator.getUserMedia) {
        navigator.getUserMedia({video : true}, gumSuccess, gumFail);
    } else {
        alert("This demo depends on getUserMedia, which your browser does not seem to support. :(");
    }

    vid.addEventListener('canplay', enablestart, false);

    /*********** setup of emotion detection *************/

    // set eigenvector 9 and 11 to not be regularized. This is to better detect motion of the eyebrows
    pModel.shapeModel.nonRegularizedVectors.push(9);
    pModel.shapeModel.nonRegularizedVectors.push(11);

    var ctrack = new clm.tracker({useWebGL : true});
    ctrack.init(pModel);
    var trackingStarted = false;

    function startVideo() {
        // start video
        vid.play();
        // start tracking
        ctrack.start(vid);
        trackingStarted = true;
        // start loop to draw face
        drawLoop();
    }

    function stopVideo() {
        vid.pause();
        ctrack.stop();
        ctrack.reset();
        trackingStarted = false;
        // start loop to draw face
        //drawLoop();
    }

    function drawLoop() {
        requestAnimFrame(drawLoop);
        overlayCC.clearRect(0, 0, vid_width, vid_height);
        //psrElement.innerHTML = "score :" + ctrack.getScore().toFixed(4);
        if (ctrack.getCurrentPosition()) {
            ctrack.draw(overlay);
        }
        var cp = ctrack.getCurrentParameters();

        var er = ec.meanPredict(cp);
        if (er) {
            updateData(er);
            for (var i = 0;i < er.length;i++) {
                if (er[i].value > 0.4) {
                    document.getElementById('icon'+(i+1)).style.visibility = 'visible';
                } else {
                    document.getElementById('icon'+(i+1)).style.visibility = 'hidden';
                }
            }
        }
    }

    delete emotionModel['disgusted'];
    delete emotionModel['fear'];
    var ec = new emotionClassifier();
    ec.init(emotionModel);
    var emotionData = ec.getBlank();

    /************ d3 code for barchart *****************/

    var margin = {top : 20, right : 20, bottom : 10, left : 40},
        width = 400 - margin.left - margin.right,
        height = 100 - margin.top - margin.bottom;

    var barWidth = 30;

    var formatPercent = d3.format(".0%");

    var x = d3.scale.linear()
        .domain([0, ec.getEmotions().length]).range([margin.left, width+margin.left]);

    var y = d3.scale.linear()
        .domain([0,1]).range([0, height]);

    var svg = d3.select("#emotion_chart").append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)

    svg.selectAll("rect").
    data(emotionData).
    enter().
    append("svg:rect").
    attr("x", function(datum, index) { return x(index); }).
    attr("y", function(datum) { return height - y(datum.value); }).
    attr("height", function(datum) { return y(datum.value); }).
    attr("width", barWidth).
    attr("fill", "#2d578b");

    svg.selectAll("text.labels").
    data(emotionData).
    enter().
    append("svg:text").
    attr("x", function(datum, index) { return x(index) + barWidth; }).
    attr("y", function(datum) { return height - y(datum.value); }).
    attr("dx", -barWidth/2).
    attr("dy", "1.2em").
    attr("text-anchor", "middle").
    text(function(datum) { return datum.value;}).
    attr("fill", "white").
    attr("class", "labels");

    svg.selectAll("text.yAxis").
    data(emotionData).
    enter().append("svg:text").
    attr("x", function(datum, index) { return x(index) + barWidth; }).
    attr("y", height).
    attr("dx", -barWidth/2).
    attr("text-anchor", "middle").
    attr("style", "font-size: 12").
    text(function(datum) { return datum.emotion;}).
    attr("transform", "translate(0, 18)").
    attr("class", "yAxis");

    function updateData(data) {
        interest.push(data);
        // update
        var rects = svg.selectAll("rect")
            .data(data)
            .attr("y", function(datum) { return height - y(datum.value); })
            .attr("height", function(datum) { return y(datum.value); });
        var texts = svg.selectAll("text.labels")
            .data(data)
            .attr("y", function(datum) { return height - y(datum.value); })
            .text(function(datum) { return datum.value.toFixed(1);});

        // enter
        rects.enter().append("svg:rect");
        texts.enter().append("svg:text");

        // exit
        rects.exit().remove();
        texts.exit().remove();
    }

    function saveInterest(catID){
        let catInterest = calcInterest(interest);
        let summedInterest = 0;

        for (let i = 0; i < catInterest.length; i++) {
           if (catInterest[i].emotion === 'angry'){
               summedInterest = summedInterest - catInterest[i].value;
           }else if(catInterest[i].emotion === 'sad'){
               summedInterest = summedInterest - catInterest[i].value;
           }else if(catInterest[i].emotion === 'surprised'){
               summedInterest = summedInterest + catInterest[i].value;
           }else if(catInterest[i].emotion === 'happy'){
               summedInterest = summedInterest + catInterest[i].value;
           }
        }
        if (summedInterest < 0 ) summedInterest = 0;
        axios.post('/ads/interest/' + catID + '/save', {
            interest: summedInterest
        });
        interest = [];
    }

    function calcInterest(){
        let calc = interest[0];

        if (calc === undefined)
            calc = [];
        else {
            for (let k = 0; k < calc.length; k++) {
                calc[k].value = 0;
            }

            for (let i=0; i < interest.length; i++){
                for (let o = 0; o < calc.length; o++) {
                    calc[o].value += interest[i][o].value;
                }
            }

            for (let j = 0; j < calc.length; j++) {
                calc[j].value = calc[j].value / interest.length;
            }
        }

        return calc;
    }

    /******** stats ********/

    let stats = new Stats();
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.top = '0px';
    document.getElementById('container').appendChild( stats.domElement );

    // update stats on every iteration
    document.addEventListener('clmtrackrIteration', function(event) {
        stats.update();
    }, false);

    window.toggleVideo = function toggleVideo() {
        var x = document.getElementById("content");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    startVideo();
}
