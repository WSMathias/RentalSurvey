const url="http://localhost/RentalSurvey/stats.php";
var serverData =new HttpClient(url)
var data=[];
var descend="DESC";
var ascend="ASC";
var fRespons=descend;
var fRate=descend;
var fDeposit=descend;
var fLease=descend;

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

function sortRespond(){

    const qry="?sort=respond&type="+fRespons;
    serverData.get(qry).then(function (result){
        data=result;
        fRespons = (fRespons==descend)?ascend:descend;
        loadTable()
    })
}
function sortRent(){
    const qry="?sort=rent&type="+fRate;
    serverData.get(qry).then(function (result){
        data=result;
        fRate = (fRate==descend)?ascend:descend;
        loadTable()
    })
}
function sortDeposit(){
    const qry="?sort=deposit&type="+fDeposit;
    serverData.get(qry).then(function (result){
        data=result;
        fDeposit = (fDeposit==descend)?ascend:descend;
        loadTable()
    })
}
function sortPeriod(){
    const qry="?sort=lease&type="+fLease;
    serverData.get(qry).then(function (result){
        data=result;
        fLease = (fLease==descend)?ascend:descend;
        loadTable()
    })
}