function handleUserNodes(template_id, content_id )
{
  return $.getJSON( "../../queries/getUserNodes.php", function( data ) {
    if (data) {
      // Grab the template script
      var theTemplateScript = $(template_id).html();
      // Compile the template
      var theTemplate = Handlebars.compile(theTemplateScript);
      // Pass our data to the template
      var theCompiledHtml = theTemplate(data);
      // Add the compiled html to the page
      $(content_id).html(theCompiledHtml);
    }
  });
  //   results.then(function( data ) {
  //     console.log('data');
  //     console.log(data);
  //     console.log('data');
  //   return (data);
  // });
  //   window.setTimeout(10000);
}
