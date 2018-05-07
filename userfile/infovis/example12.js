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

/*
    Add some node from current node
    Parameter
        rgraph : Canvas
        graph  : input Nodes (Json String)
*/
function addNode(rgraph, nodeId){
    //get graph to add
    var graph = JSON.stringify(detectExtraNodes(nodeId, JsonData));
    var tureGraph = eval('(' + graph + ')');

    

    //perform sum animation
    rgraph.op.sum(tureGraph, {
        type: 'fade:seq',
        fps: 30,
        duration: 500
        
    });
}

/*
    Remove some node from current node
    Parameter
        rgraph : Canvas
        graph  : remove Nodes id (String)
*/
function removeNode(rgraph, nodeId){
    console.log('remove Node start');
    //var graph = detectExtraNodes(nodeId, JsonData);
    //get node ids to be removed
    var n = rgraph.graph.getNode(nodeId);
    if(!n) return;
    var subnodes = n.getSubnodes(1);
    var map = [];
    for(var i = 0; i < subnodes.length; i++){
        if(subnodes[i].id !== nodeId)
            map.push(subnodes[i].id);
    }
    
    //perform node-removing animation
    rgraph.op.removeNode(map.reverse(),{
        type: 'fade:seq',
        duration: 100,
        fps: 30,
        onComplete: function(){
                removeEdge(rgraph, nodeId);
                console.log('remove Node completed');
            }
    })
  
}

/*
    Remove some Edge from current node
    Parameter
        rgraph : Canvas
        graph  : remove Nodes id (String)
*/
function removeEdge(rgraph, nodeId){
    console.log('remove Edge start');
    //var graph = detectExtraNodes(nodeId, JsonData);
    var n = rgraph.graph.getNode(nodeId);
    if(!n) return;
    var subnodes = n.getSubnodes(1);
    var map = [];
    // for(var i = 0; i < graph.length; i++){
    //     
    // }
    // console.log(map)

    n.eachAdjacency(function(adj){
        if(adj.nodeTo.id !== "0")
            map.push([nodeId,adj.nodeTo.id]);
    });

    rgraph.op.removeEdge(map,{
            type: 'fade:seq',
            duration: 100,
            fps: 30,
            onComplete: function(){
                console.log("remove edge completed")
            }
        });
}

/*
    cutdown the subnodes of current node
    Parameter
        initInput : orgin Json node data
*/
function cutdownNodes(initInput){
    var obj = initInput;
    var children = obj.children;

    for (var i = children.length - 1; i >= 0; i--) {
        children[i].children = [];
    }
    obj.children = children;
    return obj;
}


/*
    Find out the subnodes from orgin data
    Parameter
        current : Id of current node
*/
function detectExtraNodes(current, origin){
    var children = origin.children;
    var graph = [
        {
            "id": current,
            "adjacencies": []
        }
    ];
    for (var i = children.length - 1; i >= 0; i--) {
        if(children[i].id == current){
            var childs = children[i].children;
            for (var j = childs.length - 1; j >= 0; j--) {
                var id = childs[j].id;
                var obj = childs[j];
                graph[0].adjacencies.push(id);
                graph.push(obj);

            }
        }
    }
    
    return graph;
}


function init(data){
    
    //init data
    JsonData = data;
    var json = JSON.parse(JSON.stringify(JsonData));
    json = cutdownNodes(json);

    
    //end
    var infovis = document.getElementById('infovis');
    var w = infovis.offsetWidth , h = infovis.offsetHeight ;
    //init RGraph
    var rgraph = new $jit.RGraph({
        //Where to append the visualization
        injectInto: 'infovis',
        //Optional: create a background canvas that plots
        //concentric circles.

        width: 600,
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
            dim:1,
            span:2,
            overridable:true
        },
        
        Edge: {
          color: '#420420',
          lineWidth:0.5,
          CanvasStyles: {
            shadowColor: '#ccc',
            shadowBlur:20,
          },
          overridable:true
        },


        Label: {
            type: 'SVG',
            color: '#000',
           

        },
     

        Margin: {
            right: 100,
            bottom: 100
        },

        Tips: {
            enable: true,

            onShow: function(tip, node){
                var html = "<div class=\"tip-title\"><h4>" + node.name + "</h4></div>";
                var data = node.data;
                if("PP" in data) {
                    html += "<b>職稱:</b>" + data.PP ;
                }
                if("expertise" in data) {
                    html += "<br><b>專長:</b>" + data.expertise ;
                }
               
                tip.innerHTML = html;
            }
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
                rgraph.tips.hide()
                var data = node.data;
                var html = '<div class="blog"><img src="" alt="" class="img_inner fleft"><div class="extra_wrapper">' +　
                '<h3 class="blog_head color1"><a href="' + data.url + '">' + node.name + '</a></h3>' +
                '<p><b>隸屬 :</b>' + data.c_cname +  ' ' + data.d_cname +'<br> <b>專長領域 : ' + data.specialized + '</b> </p>' + '</div></div>' + 
                '<div class="bottom-article"><ul class="meta-post"><li><i class="icon-calendar"></i><a href="#">' + data.phone + '</a></li><li><i class="icon-comments"></i><a href="#">' +
                data.email + '</a></li></ul><a href=' + data.url + ' class="pull-right">Continue reading <i class="icon-angle-right"></i></a></div>'

        // <article id="detail-protofile">
        //       <div class="blog">
        //         <img src="" alt="" class="img_inner fleft">
        //         <div class="extra_wrapper">
        //           <h3 class="blog_head color1"><a href="">TEST</a></h3>
        //           <p><b>隸屬 :</b>  <br> <b>專長領域 : </b> </p>
        //         </div>
        //       </div>


        //       <div class="bottom-article">
        //         <ul class="meta-post">
        //           <li><i class="icon-calendar"></i><a href="#"></a></li>
        //           <li><i class="icon-comments"></i><a href="#">weichih@ccms.nkfust.edu.tw </a></li>
        //         </ul>
        //         <a href="" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
        //       </div>
        // </article>


                $jit.id("inner-details").innerHTML = html;

                var N_id = node.id;
                var n = rgraph.graph.getNode(N_id);
                // if(!n) return;
                var subnodes = n.getSubnodes(1);
                var map = [];
                // for(var i = 0; i < graph.length; i++){
                //     
                // }
                // console.log(map)

                n.eachAdjacency(function(adj){
                    if(adj.nodeTo.id !== "0")
                        map.push([N_id,adj.nodeTo.id]);
                });
                console.log(map)
                if(!node.anySubnode()){
                    console.log('no subnodes')
                    // console.log(node.getAdjacency())
                    if(Object.keys(map).length !== 0){
                        console.log("map is empty")
                        removeEdge(rgraph, N_id);
                    }else{
                        addNode(rgraph, N_id);
                    }
                    
                }else{
                    removeNode(rgraph, N_id);
                }
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
