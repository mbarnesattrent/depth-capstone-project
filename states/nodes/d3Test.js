
console.log("About to query");

d3.json("../../queries/getUserNodeData.php?nodeID="+getQueryVariable("nodeID"), function(data) {
    alert(data.length)
    
});


//Used for GET 
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}