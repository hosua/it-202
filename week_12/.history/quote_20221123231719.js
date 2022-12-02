window.addEventListener("DOMContentLoaded", function () {
   document.querySelector("#fetchQuotesBtn").addEventListener("click", function () {

      // Get values from drop-downs
      const topicDropdown = document.querySelector("#topicSelection");
      const selectedTopic = topicDropdown.options[topicDropdown.selectedIndex].value;
      const countDropdown = document.querySelector("#countSelection");
      const selectedCount = countDropdown.options[countDropdown.selectedIndex].value;

      // Get and display quotes
      fetchQuotes(selectedTopic, selectedCount);
   });
});

function fetchQuotes(topic, count) {
   // TODO: Modify to use XMLHttpRequest
   var xhr = new XMLHttpRequest();
   xhr.responseType = "json";
   xhr.open("GET", "https://wp.zybooks.com/quotes.php?topic=love&count=3", true);
   xhr.onload = function() {
      console.log(`RESPONSE: ${response[0].source}`)
      let html = "<ol>";
      for (let c = 1; c <= count; c++) {
         var name = xhr.response[c-1].source;
         html += `<li>Quote ${c} - ${name}</li>`;
      }
      html += "</ol>";
   }

   xhr.send();
   document.querySelector("#quotes").innerHTML = html;
}

// TODO: Add responseReceivedHandler() here
function responseReceivedHandler() {


}