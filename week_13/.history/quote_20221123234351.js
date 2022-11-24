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
   let lst = [];
   let html = "<ol>";
   xhr.onload = function () {
      let response = xhr.response;
      for (let i = 0; i < count; i++) {
         let n = response[i].source;
         let q = response[i].quote;
         console.log(n, q);
         html += `<li>Quote ${q} - ${n}</li>`;
         // lst.push({quote: q, name:n})
      }
   }
   html += "</ol>";
   // for (let i = 0; i < count; i++) {
   //    // console.log(`RESPONSE: ${response[c-1].source}`)
   //    // var name = lst[i].name;
   //    console.log(quote);
   //    // html += `<li>Quote ${quote} - ${name}</li>`;
   // }

   document.querySelector("#quotes").innerHTML = html;
}

// TODO: Add responseReceivedHandler() here
function responseReceivedHandler() {


}