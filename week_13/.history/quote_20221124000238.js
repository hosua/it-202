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

let gbl_count = 0;

function fetchQuotes(topic, count) {
   // TODO: Modify to use XMLHttpRequest
   var xhr = new XMLHttpRequest();
   xhr.responseType = "json";
   xhr.addEventListener("load", responseReceivedHandler);
   xhr.open("GET", "https://wp.zybooks.com/quotes.php?topic=love&count=3", true);
   let lst = [];
   gbl_count = count;
   xhr.onload = function() {
      let response = xhr.response;
      for (let i = 0; i < count; i++){
         let n = response[i].source;
         let q = response[i].quote;
         lst.push({quote: q, name:n})
      }
   }

   xhr.send();
}

// TODO: Add responseReceivedHandler() here
function responseReceivedHandler() {
   console.log("RECEIVED");
   let html = "<ol>";
   for (let i = 0; i < gbl_count; i++) {
      let quote = this.response[i].quote;
      let name = this.response[i].name;
      html += `<li>Quote ${quote} - ${name}</li>`;
   }
   html += "</ol>";
   document.querySelector("#quotes").innerHTML = html;
}