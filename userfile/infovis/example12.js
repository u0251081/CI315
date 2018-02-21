var labelType, useGradients, nativeTextSupport, animate,JsonData;

(function() {
  var ua = navigator.userAgent,
      iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
      typeOfCanvas = typeof HTMLCanvasElement,
      nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
      textSupport = nativeCanvasSupport 
        && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
  //I'm setting this based on the fact that ExCanvas provides text support for IE
  //and that as of today iPhone/iPad current text support is lame
  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
  nativeTextSupport = labelType == 'Native';
  useGradients = nativeCanvasSupport;
  animate = !(iStuff || !nativeCanvasSupport);
})();

var Log = {
  elem: false,
  write: function(text){
    if (!this.elem) 
      this.elem = document.getElementById('log');
    this.elem.innerHTML = text;
    this.elem.style.left = (500 - this.elem.offsetWidth / 2) + 'px';
  }
};



function init(json){
    //init data

//     var json = {  
//   "id": "aUniqueIdentifier",  
//   "name": "usually a nodes name",  
//   "data": {  
//     "some key": "some value",  
//     "some other key": "some other value"  
//    },  
//   "children": [ *other nodes or empty* ]  
// };  

//var json = require('./memeber.json');
    //end
    var infovis = document.getElementById('infovis');
    var w = infovis.offsetWidth , h = infovis.offsetHeight ;
    //init RGraph
    var rgraph = new $jit.RGraph({
        //Where to append the visualization
        injectInto: 'infovis',
        //Optional: create a background canvas that plots
        //concentric circles.

        width: 680,
        height: 600,

       
        
        background: {
            dim: 10,
          CanvasStyles: {
            strokeStyle: '#000',

          }
        },
        //Add navigation capabilities:
        //zooming by scrolling and panning.
        Navigation: {
          enable: true,
          panning: true,
          zooming: 100
        },
        //Set Node and Edge styles.
        Node: {
            
            color: '#000',
            dim:2,
            span:3,
            
        },
        
        Edge: {
          color: '#420420',
          lineWidth:0.5,
          CanvasStyles: {
            shadowColor: '#ccc',
            shadowBlur:20,
          }
        },

        Label: {
            type: 'Native',
            size: 10,
            color: '#000'
        },

        Margin: {
            right: 100,
            bottom: 100
        },



      
     
        onBeforeCompute: function(node){
            Log.write("centering " + node.name + "...");
            //Add the relation list in the right column.
            //This list is taken from the data property of each JSON node.
            $jit.id('inner-details').innerHTML = node.data.relation;
        },
        
        //Add the name of the node in the correponding label
        //and a click handler to move the graph.
        //This method is called once, on label creation.
        onCreateLabel: function(domElement, node){
            domElement.innerHTML = node.name;
            domElement.onclick = function(){
                rgraph.onClick(node.id, {
                    onComplete: function() {
                        Log.write("done");
                    }
                });
            };
        },
        //Change some label dom properties.
        //This method is called each time a label is plotted.
        onPlaceLabel: function(domElement, node){
            var style = domElement.style;
            style.display = '';
            style.cursor = 'pointer';

            if (node._depth <= 1) {
                style.fontSize = "0.8em";
                style.color = "#00b28c";
            
            } else if(node._depth == 2){
                style.fontSize = "0.7em";
                style.color = "#494949";
            
            } else {
                style.display = 'none';
            }

            var left = parseInt(style.left)+100;
            var w = domElement.offsetWidth;
            style.left = (left - w / 2) + 'px';
        }
    });
    //load JSON data
    // var refreshBtn = document.getElementById('submitButton');
    // refreshBtn.onclick = function(){
    //   function loadJSON(path, success, error)
    //     {
    //         console.log('loadJson active');
    //         var xhr = new XMLHttpRequest();
    //         xhr.onreadystatechange = function()
    //         {
    //             if (xhr.readyState === XMLHttpRequest.DONE) {
    //                 if (xhr.status === 200) {
    //                     if (success)
    //                         success(JSON.parse(xhr.responseText));
    //                 } else {
    //                     if (error)
    //                         error(xhr);
    //                 }
    //             }
    //         };
    //         xhr.open("GET", path, true);
    //         xhr.send();
    //     };

    //   loadJSON('http://163.18.53.149/IICwebsite/ci315/index.php/home/jsont',
    //      function(data) { console.log('fuck');console.log(data); rgraph.loadJSON(data);rgraph.refresh();},
    //      function(xhr) { console.error(xhr); });
    // }
    // ctx.scale(3,3);

    rgraph.loadJSON(json);
    //trigger small animation
    rgraph.graph.eachNode(function(n) {
      var pos = n.getPos();
      pos.setc(200, 200);
    });
    rgraph.compute('end');
    rgraph.fx.animate({
      modes:['polar'],
      duration: 2000
    });
    //end
    //append information about the root relations in the right column
    $jit.id('inner-details').innerHTML = rgraph.graph.getNode(rgraph.root).data.relation;
}
