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
    console.log(json);
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
    var jsons={
        id: "190_0",
        name: "Fuck",
        children: [
                    {
                        id: "107877_3",
                        name: "Neil Young &amp; Pearl Jam",
                        data: {
                            relation: "<h4>Neil Young &amp; Pearl Jam</h4><b>Connections:</b><ul><li>Pearl Jam <div>(relation: collaboration)</div></li><li>Neil Young <div>(relation: collaboration)</div></li></ul>"
                        },
                        children: [{
                            id: "964_4",
                            name: "Neil Young",
                            data: {
                                relation: "<h4>Neil Young</h4><b>Connections:</b><ul><li>Neil Young &amp; Pearl Jam <div>(relation: collaboration)</div></li></ul>"
                            },
                            children: []
                        }]
                    }, {
                        id: "236797_5",
                        name: "Jeff Ament",
                        data: {
                            relation: "<h4>Jeff Ament</h4><b>Connections:</b><ul><li>Pearl Jam <div>(relation: member of band)</div></li><li>Temple of the Dog <div>(relation: member of band)</div></li><li>Mother Love Bone <div>(relation: member of band)</div></li><li>Green River <div>(relation: member of band)</div></li><li>M.A.C.C. <div>(relation: collaboration)</div></li><li>Three Fish <div>(relation: member of band)</div></li><li>Gossman Project <div>(relation: member of band)</div></li></ul>"
                        },
                        children: [{
                            id: "346850_11",
                            name: "Gossman Project",
                            data: {
                                relation: "<h4>Gossman Project</h4><b>Connections:</b><ul><li>Jeff Ament <div>(relation: member of band)</div></li></ul>"
                            },
                            children: []
                        }]
                    }, {
                        id: "236585_30",
                        name: "Mike McCready",
                        data: {
                            relation: "<h4>Mike McCready</h4><b>Connections:</b><ul><li>Pearl Jam <div>(relation: member of band)</div></li><li>Mad Season <div>(relation: member of band)</div></li><li>Temple of the Dog <div>(relation: member of band)</div></li><li>$10,000 Gold Chain <div>(relation: collaboration)</div></li><li>M.A.C.C. <div>(relation: collaboration)</div></li><li>The Rockfords <div>(relation: member of band)</div></li><li>Gossman Project <div>(relation: member of band)</div></li></ul>"
                        },
                        children: [{
                            id: "236585_30",
                            name: "Gossman Project",
                            data: {
                                relation: "<h4>Gossman Project</h4><b>Connections:</b><ul><li>Mike McCready <div>(relation: member of band)</div></li></ul>"
                            },
                            children: []
                        }]
                    }, {
                        id: "236585_30",
                        name: "Matt Cameron",
                        data: {
                            relation: "<h4>Matt Cameron</h4><b>Connections:</b><ul><li>Pearl Jam <div>(relation: member of band)</div></li><li>Soundgarden <div>(relation: member of band)</div></li><li>Temple of the Dog <div>(relation: member of band)</div></li><li>Eleven <div>(relation: supporting musician)</div></li><li>Queens of the Stone Age <div>(relation: member of band)</div></li><li>Wellwater Conspiracy <div>(relation: member of band)</div></li><li>M.A.C.C. <div>(relation: collaboration)</div></li><li>Tone Dogs <div>(relation: member of band)</div></li></ul>"
                        },
                        children: [{
                            id: "236585_30",
                            name: "M.A.C.C.",
                            data: {
                                relation: "<h4>M.A.C.C.</h4><b>Connections:</b><ul><li>Matt Cameron <div>(relation: collaboration)</div></li></ul>"
                            },
                            children: []
                        }, {
                            id: "353097_37",
                            name: "Tone Dogs",
                            data: {
                                relation: "<h4>Tone Dogs</h4><b>Connections:</b><ul><li>Matt Cameron <div>(relation: member of band)</div></li></ul>"
                            },
                            children: []
                        }]
                    }
        ],
        data: {
            relation: "<h4>Pearl Jam</h4><b>Connections:</b><ul><li>Pearl Jam &amp; Cypress Hill <div>(relation: collaboration)</div></li><li>Neil Young &amp; Pearl Jam <div>(relation: collaboration)</div></li><li>Jeff Ament <div>(relation: member of band)</div></li><li>Stone Gossard <div>(relation: member of band)</div></li><li>Eddie Vedder <div>(relation: member of band)</div></li><li>Mike McCready <div>(relation: member of band)</div></li><li>Matt Cameron <div>(relation: member of band)</div></li><li>Dave Krusen <div>(relation: member of band)</div></li><li>Matt Chamberlain <div>(relation: member of band)</div></li><li>Dave Abbruzzese <div>(relation: member of band)</div></li><li>Jack Irons <div>(relation: member of band)</div></li></ul>"
        }
    };
    
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
            type: 'SVG',
            size: 20,
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

                var n = rgraph.graph.getNode(node.id);
                if(!n) return;
                var subnodes = n.getSubnodes(0);
                var map = [];
                for(var i=1; i<subnodes.length; i++){
                    map.push(subnodes[i].id);
                }

                rgraph.op.removeNode(map.reverse(),{
                    type: 'fade:seq',
                    duration: 1000,
                    fps: false
                    
                });
                // rgraph.onClick(node.id, {
                //     onComplete: function() {
                //         Log.write("done");
                //     }
                // });
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
