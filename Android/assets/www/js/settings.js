// Open a database object
var db = window.openDatabase("YOUFOOD", "1.0", "YOUFOOD", 5000000);
db.transaction(createTables);

function createTables(tx) {
    //tx.executeSql('DROP TABLE IF EXISTS settings;', [], nullDataHandler, errorHandler);
    tx.executeSql('CREATE TABLE IF NOT EXISTS settings(id INTEGER PRIMARY KEY, type TEXT NOT NULL, value TEXT NOT NULL);', [], nullDataHandler, errorHandler);
}

function nullDataHandler(transaction, results) { }
function errorHandler(transaction, results) {alert("Error processing SQL: Message : "+results.message);}

function responseDataHandler(transaction, results) { window.location.href = 'index.html';}

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

function retrieveWaiters() {
    $.ajax({
        url: 'http://youfood.lan/webservices/waiters.php?do=retrieve',
        dataType: 'jsonp',
        timeout: 5000,
        success: function(data, status){ 
            $.each(data, function(i,item){ 
                var waiter = '<option value="'+ item.id +'">'+ item.firstName + " " + item.lastName +'</option>';
                $('select[name="select-waiter"]').append(waiter);
            });
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    }); 
}

function retrieveRestaurants() {
    $.ajax({
        url: 'http://youfood.lan/webservices/restaurants.php?do=retrieve',
        dataType: 'jsonp',
        timeout: 5000,
        success: function(data, status){ 
            $.each(data, function(i,item){ 
                var restaurant = '<option value="'+ item.id +'">'+ item.name + " | " + item.country.name +'</option>';
                $('select[name="select-restaurant"]').append(restaurant);
            });
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    }); 
}

function saveSettings() {
    
    var restaurantId = $('select[name="select-restaurant"]').val();
    var waiterId = $('select[name="select-waiter"]').val();
    var table = $('input[name=table]').val();
    
    db.transaction(
        function (transaction) {
            var sql = 'DELETE FROM settings;';
            transaction.executeSql(sql, []);
            sql = 'INSERT OR REPLACE INTO settings (type, value) VALUES ("restaurant", "' + restaurantId +'");';
            transaction.executeSql(sql, []);
            sql = 'INSERT OR REPLACE INTO settings (type, value) VALUES ("waiter", "' + waiterId +'");';
            transaction.executeSql(sql, []);
            sql = 'INSERT OR REPLACE INTO settings (type, value) VALUES ("table", "' + table +'");';
            transaction.executeSql(sql, [], responseDataHandler);
        });
}

function retrieveSettings() {
    
    db.transaction(
        function (transaction) {
            var sql = 'SELECT value FROM settings WHERE type = "restaurant";';
            transaction.executeSql(sql, [], function(transaction, results) {
                $('select[name="select-restaurant"] option').each(function() {
                    if($(this).val() == results.rows.item(0).value) {
                        $(this).attr('selected', 'selected');
                        $('div#restaurant-div span.ui-btn-text').html($(this).text());
                        
                    }
                });
            });
            sql = 'SELECT value FROM settings WHERE type = "waiter";';
            transaction.executeSql(sql, [], function(transaction, results) {
                $('select[name="select-waiter"] option').each(function() {
                    if($(this).val() == results.rows.item(0).value) {
                        $(this).attr('selected', 'selected');
                        $('div#waiter-div span.ui-btn-text').html($(this).text());
                        
                    }
                });
            });
            sql = 'SELECT value FROM settings WHERE type = "table";';
            transaction.executeSql(sql, [], function(transaction, results) {
                $('input[name=table]').val(results.rows.item(0).value);
            });
        });
}

$(document).ready(function() {
   retrieveWaiters(); 
   retrieveRestaurants();
   retrieveSettings();
});
