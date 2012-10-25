$(document).ready(function() {

    var appetizers = $('#appetizers');
    var dishes = $('#dishes');
    var desserts = $('#desserts');
    var drinks = $('#drinks');

    $.ajax({
    url: 'http://youfood.lan/webservices/products.php?type=appetizers',
    dataType: 'jsonp',
    timeout: 5000,
    success: function(data, status){ 
        $.each(data, function(i,item){
        var appetizer = '<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-corner-top ui-btn-up-c"><div class="ui-btn-inner ui-li ui-corner-top"><div class="ui-btn-text"><a onclick="javascript:addToCart(this);" href="#" class="ui-link-inherit" id="' + item.id +'"><img src="' + item.imagePath + '" class="ui-li-thumb ui-corner-tl"/>' + item.name + ' (' + item.price + ' €)</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>';
        appetizers.append(appetizer);
        });
    },
    error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);

        appetizers.text('There was an error loading the data.');
    }
    });   

    $.ajax({
    url: 'http://youfood.lan/webservices/products.php?type=dishes',
    dataType: 'jsonp',
    timeout: 5000,
    success: function(data, status){ 
        $.each(data, function(i,item){
        var dish = '<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-corner-top ui-btn-up-c"><div class="ui-btn-inner ui-li ui-corner-top"><div class="ui-btn-text"><a onclick="javascript:addToCart(this);" href="#" class="ui-link-inherit" id="' + item.id +'"><img src="' + item.imagePath + '" class="ui-li-thumb ui-corner-tl"/>' + item.name + ' (' + item.price + ' €)</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>';
        dishes.append(dish);
        });
    },
    error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);

        dishes.text('There was an error loading the data.');
    }
    });   

    $.ajax({
    url: 'http://youfood.lan/webservices/products.php?type=desserts',
    dataType: 'jsonp',
    timeout: 5000,
    success: function(data, status){ 
        $.each(data, function(i,item){
        var dessert = '<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-corner-top ui-btn-up-c"><div class="ui-btn-inner ui-li ui-corner-top"><div class="ui-btn-text"><a onclick="javascript:addToCart(this);" href="#" class="ui-link-inherit" id="' + item.id +'"><img src="' + item.imagePath + '" class="ui-li-thumb ui-corner-tl"/>' + item.name + ' (' + item.price + ' €)</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>';
        desserts.append(dessert);
        });
    },
    error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);

        desserts.text('There was an error loading the data.');
    }
    });   

    $.ajax({
    url: 'http://youfood.lan/webservices/products.php?type=drinks',
    dataType: 'jsonp',
    timeout: 5000,
    success: function(data, status){ 
        $.each(data, function(i,item){
        var drink = '<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-corner-top ui-btn-up-c"><div class="ui-btn-inner ui-li ui-corner-top"><div class="ui-btn-text"><a onclick="javascript:addToCart(this);" href="#" class="ui-link-inherit" id="' + item.id +'"><img src="' + item.imagePath + '" class="ui-li-thumb ui-corner-tl"/>' + item.name + ' (' + item.price + ' €)</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>';
        drinks.append(drink);
        });
    },
    error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);

            drinks.text('There was an error loading the data.');
    }
    }); 
    
    $.ajax({
    url: 'http://youfood.lan/webservices/country.php?get=current',
    dataType: 'jsonp',
    timeout: 5000,
    success: function(data, status){ 
        $('#country_name').append(data.name);
    },
    error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);

        appetizers.text('There was an error loading the data.');
    }
    });  
});