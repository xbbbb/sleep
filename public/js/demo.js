const targetLang = 'zh-cn';
const wordList=[
    "foot",
    "head",
    "face",
    "hair",
    "nose",
    "mouth",
    "eye",
    "ear",
    "arm",
    "hand",
    "finger",
    "leg",
    "red",
    "blue",
    "yellow",
    "green",
    "white",
    "black",
    "pink",
    "purple",
    "orange",
    "brown",
    "pen",
    "pencil",
    "ruler",
    "book",
    "bag",
    "cat",
    "dog",
    "pig",
    "duck",
    "eagle",
    "snake",
    "rice",
    "bread",
    "beef",
    "milk",
    "water",
    "hamburger",
    "Coke",
]


function handleMouseMove(event) {
    let mouseX = event.clientX;
    let mouseY = event.clientY;
    let svg = document.getElementById("faceSVG");
    let eyeL = document.getElementById("leftEye");
    let eyeR = document.getElementById("rightEye");
    console.log(svg.width);
    let rect = svg.getBoundingClientRect();
    let minX=550;
    let maxX=850;
    let r=40;
    let lookInsideMin=600;
    let lookInsideMax=800;
    let lookInsideMidL=675;
    let lookInsideMidR=725;
    if(mouseX>=minX&&mouseX<lookInsideMidL){
        eyeL.setAttribute('cx', mouseX-r);

    }
    else if(mouseX<minX){
        eyeL.setAttribute('cx', minX-r);
    }
    else{
        eyeL.setAttribute('cx', lookInsideMidL-r);
    }
    if(mouseX<lookInsideMidR){
        eyeR.setAttribute('cx', lookInsideMidR+r);
    }
    else if(mouseX>=lookInsideMidR&&mouseX<maxX){
        eyeR.setAttribute('cx', mouseX+r);
    }
    else{
        eyeR.setAttribute('cx', maxX+r);

    }

    let minY=150;
    let maxY=200;

    if(mouseY>minY&&mouseY<maxY){
        eyeL.setAttribute('cy', mouseY);
        eyeR.setAttribute('cy', mouseY);
    }
    else if(mouseY<minY){
        eyeL.setAttribute('cy', minY);
        eyeR.setAttribute('cy', minY);
    }
    else{
        eyeL.setAttribute('cy', maxY);
        eyeR.setAttribute('cy', maxY);
    }
}



var mutipleChoiceAnswer="";
var options=[];
function askMultipleChoice(){
    let selectIndex=randomBetween(0,wordList.length-1);
    var optionIndex1=randomBetween(0,wordList.length-1);

    var optionIndex2=randomBetween(0,wordList.length-1);

    var optionIndex3=randomBetween(0,wordList.length-1);

    while(selectIndex==optionIndex1||
    selectIndex==optionIndex2||
    selectIndex==optionIndex3||
    optionIndex1==optionIndex2||
    optionIndex1==optionIndex3||
    optionIndex2==optionIndex3){
        selectIndex=randomBetween(0,wordList.length-1);
        optionIndex1=randomBetween(0,wordList.length-1);
        optionIndex2=randomBetween(0,wordList.length-1);
        optionIndex3=randomBetween(0,wordList.length-1)
    }
    translate(wordList[selectIndex]+","+wordList[optionIndex1]+","+wordList[optionIndex2]+","+wordList[optionIndex3],function (response) {
        let result= response.data.translations[0].translatedText;
        var list=result.split("，");
        mutipleChoiceAnswer=list[0];
        console.log(mutipleChoiceAnswer);
        let rand=Math.random();
        let index=0;
        if(rand<=0.25){
            index=0
        }
        else if(rand>0.25&&rand<=0.5){
            index=1
        }
        else  if(rand>0.5&&rand<=0.75){
            index=2
        }
        else{
            index=3
        }
        options.push(list[index])
        list.splice(index,1)

        rand=Math.random();
        if(rand<=0.334){
            index=0
        }
        else if(rand>0.334&&rand<=0.667){
            index=1
        }
        else{
            index=2
        }
        options.push(list[index])
        list.splice(index,1);
        rand=Math.random();
        if(rand<=0.5){
            index=0
        }
        else{
            index=1
        }
        options.push(list[index])
        list.splice(index,1);
        rand=Math.random();
        options.push(list[0]);


    })



}

askMultipleChoice();


function randomBetween(min, max){
    return Math.floor(Math.random()*(max-min)+min);
}




function speak(text, lang) {
    /*Check that your browser supports text to speech*/
    if ('speechSynthesis' in window) {
        const msg = new SpeechSynthesisUtterance("Shall I talk?");
        const voices = window.speechSynthesis.getVoices();
        if (voices.length > 0) {
            msg.voice = voices.filter(function(voice) { return voice.lang == lang; })[1];
        }
        msg.voiceURI = 'native';
        msg.volume = 0.8; // 0 to 1
        msg.rate = 0.6; // 0.1 to 10
        msg.pitch = 0.6; //0 to 2
        msg.text = text;
        msg.lang = lang;
        msg.onend = function(e) {
            console.log('Finished in ' + e.elapsedTime + ' milliseconds.');
        };
        speechSynthesis.speak(msg);
    }
}





function handleLoadEvent() {
    let config = {
        apiKey: "AIzaSyDsRTH6dhF43zvT4pSOyPdJo2mf6Oifl2s",
        authDomain: "eco-notch-297102.firebaseapp.com",
        databaseURL: "https://eco-notch-297102-default-rtdb.firebaseio.com",
        projectId: "eco-notch-297102",
        storageBucket: "eco-notch-297102.appspot.com",
        messagingSenderId: "934778960243",
        appId: "1:934778960243:web:d79afc2e854de6da39ad06",
        measurementId: "G-7QGZT95WRX"
    };
    firebase.initializeApp(config);
    var dbRef = firebase.database().ref('/detection');
    dbRef.on("value", newFaceDetected);

}







function startVideo() {
    if (navigator.mediaDevices &&
        navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({video: true})
            .then(handleUserMediaSuccess)
            .catch(handleUserMediaError);
    }
}

function handleUserMediaError(error){
    console.log(error);
}

function handleUserMediaSuccess(stream){
    var video = document.getElementById("myVideo");
    video.srcObject = stream;
    // video.play();
    console.log("success");
    window.setInterval(captureImageFromVideo, 200);
}

// The variable that holds the detected face information, which will be updated through Firebase callbacks
var detection = null;

function captureImageFromVideo() {
    const canvas = document.getElementById("mainCanvas");
    const context = canvas.getContext("2d");

    const video = document.getElementById("myVideo");
    canvas.setAttribute("width", video.width);
    canvas.setAttribute("height", video.height);
    // Draw video image onto Canvas
    context.drawImage(video, 0, 0, video.width, video.height);

    sendSnapshot();

    //var dataObj = context.getImageData(0, 0, canvas.width, canvas.height);

    // If a face detection has been received from the database, draw a rectangle around it on Canvas
    if (detection) {
        const face = detection[0];
        context.beginPath();
        context.moveTo(face.x, face.y);
        context.lineTo(face.x + face.w, face.y);
        context.lineTo(face.x + face.w, face.y + face.h);
        context.lineTo(face.x, face.y + face.h);
        context.lineTo(face.x, face.y);
        context.lineWidth = 5;
        context.strokeStyle = "#0F0";
        context.fillStyle = "#0F0";
        context.stroke();
    }
}

function sendSnapshot() {
    const canvas = document.getElementById("mainCanvas");
    // Convert the image into a a URL string with built0-in canvas function
    const data = canvas.toDataURL();

    const commaIndex = data.indexOf(",");

    const imgString = data.substring(commaIndex+1,data.length);
    storeImage(imgString);
}



function storeImage(imgContent)
{
    // store this at a particular place in our database
    var dbRef = firebase.database().ref('/');
    dbRef.update({"image":imgContent});
}

// Register a callback for when a detection is updated in the database
var dbRef2 = firebase.database().ref('/detection');
dbRef2.on("value", newFaceDetected);

function newFaceDetected(snapshot) {

    detection = snapshot.val();
    open=document.getElementById("mouthOpen")
    close=document.getElementById("mouthClose")
    if(detection==null){
        open.style.display="none";
        close.style.display="block";

    }
    else{
        open.style.display="block";
        close.style.display="none";
    }
    console.log(detection)
}







function translate(textInput,callback)
{

    var settings =
        {
            "url": "https://translation.googleapis.com/language/translate/v2?key=AIzaSyBBwYMJhPT_oLjD6rRCmcBeW-0Es79WKRU",
            "method": "POST",
            "timeout": 0,
            "headers": {"Content-Type": "application/json"},
            "data": JSON.stringify({"source":"en","target":"zh-cn","format":"text","q": textInput}),
        };
    //var translationText = document.getElementById("translationText");
    $.ajax(settings).done(function (response)
    {
        callback(response);
        // translationText.innerHTML = response.data.translations[0].translatedText;
        //console.log(response.data.translations[0].translatedText);
        //  return response.data.translations[0].translatedText;
        //speak(translationText.innerHTML, "zh-cn");
    });

}



