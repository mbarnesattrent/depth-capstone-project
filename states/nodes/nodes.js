$.getJSON( "../../queries/getUserNodes.php", function( data ) {
  if (data) {
    // Grab the template script
    var theTemplateScript = $("#address-template").html();
    // Compile the template
    var theTemplate = Handlebars.compile(theTemplateScript);
    // Pass our data to the template
    var theCompiledHtml = theTemplate(data);
    // Add the compiled html to the page
    $('#node-content').html(theCompiledHtml);
  }
});