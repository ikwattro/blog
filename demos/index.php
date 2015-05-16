<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Vis.js demo</title>
    <link rel="stylesheet" href="bower_components/vis/dist/vis.min.css"/>
</head>

<body>
<div id="graph" style="width:1000px; height:1000px;"></div>

<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/vis/dist/vis.min.js"></script>
<script type="text/javascript">
    var container = document.getElementById('graph');
    var options = {
        configurePhysics: true,
        physics: {barnesHut: {gravitationalConstant: -15150, centralGravity: 3.45, springLength: 261, damping: 0.3}},
        nodes: {
            shape: 'circle',
            radius: 15,
            radiusMax: 20,
            fontSize: 11
        },
        edges: {
            style: 'arrow',
            labelAlignment: 'line-above'
        }
    };
    var json = $.getJSON("https://gist.githubusercontent.com/ikwattro/8a8b0a6cfe4910db20b7/raw/de4fbbeecae349338aea065bd96a25913ed78301/graph.json")
        .done(function(data){
            var nodes = [];
            var edges = [];
            $.each(data.nodes, function(i, d){
                d.group = d.label;
                nodes.push(d);
            });
            $.each(data.edges, function(i, d){
                d.label = d.type
                edges.push(d);
            });
            var g = {
                nodes: nodes,
                edges: edges
            };
            var network = new vis.Network(container, g, options);
        });
</script>
</body>
</html>
