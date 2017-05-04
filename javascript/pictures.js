/**
 * Created by emarrero on 3/23/2017.
 */

function processResponse(data){
    console.log(data);

    window.agent.play( (data.results.length == 0) ? 'Sad' : 'Pleased'  );

    window.agent.speak("I found " + data.results.length + " pictures for you.");

    for(i = 0; i < data.results.length; i++) {
        addImage(data.results[i].title, data.results[i].image.full, data.results[i].image.alt);
    }

    $('#resultsDiv').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        centerPadding: '60px',
        autoplay: true,
        autoplaySpeed: 2000
    });
}

function startSearch(){
    var searchTerm = document.getElementById('searchBox').value;

    if(searchTerm.trim() == ""){
        window.agent.play('Confused');
        window.agent.speak("Please tell me what to search for.");
        return;
    }

    window.agent.play('Search');
    doSearch(searchTerm);
}

function addImage(title, url, altText){
    var aDiv = document.createElement("DIV");
    var aFigure = document.createElement("FIGURE");
    var anImage = document.createElement("IMG");
    var aCaption = document.createElement("FIGCAPTION");

    aFigure.appendChild(anImage);
    aFigure.appendChild(aCaption);
    aDiv.appendChild(aFigure);

    anImage.src = url;
    anImage.alt = altText;
    aCaption.innerText = title;

    document.getElementById("resultsDiv").appendChild(aDiv);
}

function clearANodeById(nodeId){
    var node = document.getElementById(nodeId);
    while(node.hasChildNodes()){
        node.removeChild(node.firstChild);
    }
}

function doSearch(searchTerm){
    // clears the results div
    $('#resultsDiv').slick('unslick');
    $('#resultsDiv').empty();



    var aScriptElement = document.createElement("SCRIPT");
    aScriptElement.src = "http://www.loc.gov/pictures/search/?fo=json&callback=processResponse&q=" +
        encodeURIComponent( searchTerm );

    document.body.appendChild(aScriptElement);


}


function loadAgent(agentName){
    if(window.agent){
        window.agent.stop();
        window.agent.hide();
    }

    clippy.load(agentName, function(clippysAgent){
        window.agent = clippysAgent;
        window.agent.show();
        window.agent.moveTo( 200, 200 );
    });
}


loadAgent('Peedy');









