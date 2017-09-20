const url="http://localhost/RentalSurvey/stats.php";
var serverData =new HttpClient(url)
var data=[];
var table=document.getElementById("tbrow")
$( document ).ready(function() {
    getTableData();
});
function getTableData(){
     serverData.get().then(function (result){
         data=result;
         loadTable()
     })
}
function loadTable(){
    table.innerHTML="";
    for (i in data){
        console.log(data[i].location);
        table.innerHTML+=
      `<tr>
        <td>`+data[i].location+`</td>
        <td>`+data[i].lCount+`</td>
        <td>`+data[i].avgPrice+`</td>
        <td>`+data[i].avgDeposit+`</td>
        <td>`+data[i].avgLease+`</td>        
      </tr>`;
    }
}