//document.addEventListener("deviceready", onDeviceReady, false);   

// Open a database object
var db = window.openDatabase("YOUFOOD", "1.0", "YOUFOOD", 5000000);
db.transaction(createTables);

//function onDeviceReady() {
//    db.transaction(createTables, error, success);
//}

function addToCart(link) {
    // Retrieve product ID
    var id = link.id;
    populateDB(db, id);
}

function createTables(tx) {
    //tx.executeSql('DROP TABLE IF EXISTS dishes;', [], nullDataHandler, errorHandler);
    tx.executeSql('CREATE TABLE IF NOT EXISTS dishes(id INTEGER PRIMARY KEY, dish INTEGER NOT NULL);', [], nullDataHandler, errorHandler);
}

function nullDataHandler(transaction, results) { }
function errorHandler(transaction, results) { alert("Error processing SQL: Message : "+results.message); }

// Populate the database 
//
function populateDB(db, id) {
    var sql = 'INSERT INTO dishes (dish) VALUES (' + id +');';
    db.transaction(
        function (transaction) {
            transaction.executeSql(sql, [], responseDataHandler, errorHandler);
        }
    );
}

function responseDataHandler(transaction, results) { window.location.href = 'order.html'; }

// Transaction error callback
//
function error(tx, err) {
    alert("Error processing SQL: "+err);
}

// Transaction success callback
//
function success() {
    alert("success!");
}
