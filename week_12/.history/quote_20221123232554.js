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
   let lst;
   xhr.onload = function() {
      let response = xhr.response;
      for (let i = 0; i < count; i++){
         let name = response[c-1].source;
         let quote = response[c-1].quote;
         lst.push({quote: quote, name:name})
      }
   }
   // console.log(lst);
   for (let c = 1; c <= count; c++) {
      // console.log(`RESPONSE: ${response[c-1].source}`)
      html += `<li>Quote ${c} - ${name}</li>`;
   }
   let html = "<ol>";
   html += "</ol>";

   xhr.send();
   document.querySelector("#quotes").innerHTML = html;
}

// TODO: Add responseReceivedHandler() here
function responseReceivedHandler() {


}