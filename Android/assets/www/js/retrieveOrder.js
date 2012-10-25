//document.addEventListener("deviceready", onDeviceReady, false);
document.addEventListener("PaypalPaymentEvent.Success", onPaymentSuccess,false);

function onDeviceReady() {
	initializeMPL();
}

// Open a database object
var db = window.openDatabase("YOUFOOD", "1.0", "YOUFOOD", 5000000);
var orderData;
var total = 0;
var restaurantId;
var waiterId;
var table;
var jsonObject;

$(document).ready(function() {
    
    db.transaction(queryDB);
    rSettings();
                
    $('#payment-button').click(function() { 
       
        var amount = total.toString();
        var myMerchantName = 'YouFoodInc.';
        var myRecipient = 'Seller_1336934946_biz@supinfo.com';
        var myItemdesc = 'Order Payment';
        var currency = 'EUR';
    	
        setPaymentInfoForm(amount, myMerchantName, myRecipient, myItemdesc, currency);
    	
    	//payButton(0);
    });
});

function onPaymentSuccess(evt)
{
    jsonObject = '{"restaurantId": '+restaurantId+', "waiterId": '+waiterId+', "table": '+table+', "transactionId": "'+evt.transactionID+'", "dishes": [';
    for(var i=0; i<orderData.rows.length-1; i++) {
        jsonObject += '{"dishId": '+orderData.rows.item(i).dish+'},';
    }
    jsonObject += '{"dishId": '+orderData.rows.item(i).dish+'}]}';
    console.log(jsonObject);
    
    $.ajax({
        type: "POST",
        url: "http://youfood.lan/webservices/saveOrder.php",
        data: { order: jsonObject },
        dataType: "json",
        success: function(result) {
            navigator.notification.alert(
                'Votre commande a bien ŽtŽ enregistrŽe sous le numŽro de transaction : '+evt.transactionID+'.',  // message
                 emptyCart,    // callback
                'YouFoodInc.', // title
                'OK'           // buttonName
            );
        },
        error: function(result) {
            console.log(result);
        }
    });
}

function onPaymentCanceled(evt)
{
    navigator.notification.alert("Payment canceled.");
}

function onPaymentFailed(evt)
{
    navigator.notification.alert("Payment failed, errorType: " + evt.errorType);
    // compare evt.errorType to PayPalFailureType enum values
}


function queryDB(tx) {
    tx.executeSql('SELECT * FROM dishes;', [], querySuccess, error);
}

function querySuccess(tx, results) {
    orderData = results; //SQLResultSet
    fetchDetails();
}

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


// Fetch dishes details from server
function fetchDetails() {
    for(var i=0; i<orderData.rows.length; i++) {
        $.ajax({
            url: 'http://youfood.lan/webservices/products.php?id='+orderData.rows.item(i).dish,
            dataType: 'jsonp',
            timeout: 5000,
            success: customCallback,
            context: {dbRow: orderData.rows.item(i).id},
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        }); 
    }
}

function customCallback(data, status) {
    var dish = '<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="false" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li ui-li-has-alt ui-li-has-thumb ui-corner-top ui-btn-up-c"><div class="ui-btn-inner ui-li ui-li-has-alt ui-corner-top"><div class="ui-btn-text"><a href="#" class="ui-link-inherit" id="' + data.id +'"><img src="' + data.imagePath + '" class="ui-li-thumb ui-corner-tl"/>' + data.name + ' (' + data.price + ' â‚¬)</a></div></div><a href="#" id="'+ this.dbRow +'" onclick="javascript:removeProduct(this);" data-icon="false" title="Supprimer" class="ui-li-link-alt ui-btn ui-corner-tr ui-btn-up-c" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="span" data-iconpos="false" data-theme="c"><span class="ui-btn-inner ui-corner-tr"><span class="ui-btn-text ui-corner-tr"></span><span data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="minus" data-iconpos="notext" data-theme="b" title="" class="ui-btn ui-btn-up-b ui-shadow ui-btn-corner-all ui-btn-icon-notext"><span class="ui-btn-inner ui-btn-corner-all ui-corner-tr"><span class="ui-btn-text ui-corner-tr"></span><span class="ui-icon ui-icon-minus ui-icon-shadow">&nbsp;</span></span></span></span></a></li>';                    
    total += parseFloat(data.price);
    $('#dishes').append(dish);
    $('#total').html('Total de la commande : ' + total + 'â‚¬');
    //$('input[name="amount"]').val(total);
}

// Remove a product from cart
function removeProduct(link) {
    var productId = link.id;
    var sql = 'DELETE FROM dishes where id = ' + productId +';';
    db.transaction(
        function (transaction) {
            transaction.executeSql(sql, [], function() { window.location.href = 'order.html'; }, errorHandler);
        }
    );
}

function emptyCart() {
    var sql = 'DELETE FROM dishes;';
    db.transaction(
        function (transaction) {
            transaction.executeSql(sql, [], responseDataHandler, errorHandler);
        } 
    );
}

function nullDataHandler(transaction, results) {  }
function errorHandler(transaction, results) {alert("Error processing SQL: Message : "+results.message);}
function responseDataHandler(transaction, results) { window.location.href = 'index.html';}

function rSettings() {
    
    db.transaction(
        function (transaction) {
            var sql = 'SELECT value FROM settings WHERE type = "restaurant";';
            transaction.executeSql(sql, [], function(transaction, results) {
                restaurantId = results.rows.item(0).value; 
            });
            sql = 'SELECT value FROM settings WHERE type = "waiter";';
            transaction.executeSql(sql, [], function(transaction, results) {
                waiterId = results.rows.item(0).value;
            });
            sql = 'SELECT value FROM settings WHERE type = "table";';
            transaction.executeSql(sql, [], function(transaction, results) {
                table = results.rows.item(0).value;
            });
        }
    );
}

function errorSettings() {
    alert("Error processing SQL: "+err);
}