 //index js
 
 $(document).ready(function ($)  {
  $('.image-link').magnificPopup({type:'image'});
});



function postRecord(id){
    console.log("btn clicked1");

    var dataId = id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(dataId);

    $.ajax({
    type: 'get',
    data:  dataId,
    url: '/addToCart/'+dataId,
    success:
        function( response ){
            myFunction();
            cartCount();

        }
    });
};



function cartCount(){
    console.log("count record");

    $.ajax({
    type: 'get',
    url: '/getCart',
    dataType: 'json',
    success:
        function( data ){
            //localStorage.clear();
            var count=0;
            $.each(data, function(index, element) {


                count = count + 1;
            });
            // console.log(count);
            // if(count==0){
            //     $("span #counter").hide();
            // }else{
            //     $("#counter").text(count);
            // }
            // $("#tec_cart").html('<span class="cart-basket d-flex align-items-center justify-content-center" id="counter">'+'</span>');
            $("#counter").text(count);
        }
    });
};




$(function () {
    "use strict";

    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });

    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });

});
$(document).ready(function(){

    cartCount();



    });




function removeItem(id){
    console.log("Remove from cart");

    var dataId = id;
    // console.log(dataId);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
    type: 'get',
    data:  dataId,
    url: '/remove/'+dataId,
    dataType: 'json',
    success:
        function( data ){
            // console.log(data);
            fetchRecord();
            $('#t_data').remove();
        }
    });
};





    (function($) {
        var pagify = {
            items: {},
            container: null,
            totalPages: 1,
            perPage: 3,
            currentPage: 0,
            createNavigation: function() {
                this.totalPages = Math.ceil(this.items.length / this.perPage);
    
                $('.pagination', this.container.parent()).remove();
                var pagination = $('<ul class="pagination" justify-content-center"></nav>').append(' <li class="page-item"><a class="nav prev page-link disabled" data-next="false">Previous</a></li>');
    
                for (var i = 0; i < this.totalPages; i++) {
                    var pageElClass = "page";
                    if (!i)
                        pageElClass = "page current";
                    var pageEl = '<li class="page-item "><a class="' + pageElClass + '" data-page="' + (
                    i + 1) + '">' + (
                    i + 1) + "</a></li>";
                    pagination.append(pageEl);
                }
                pagination.append('<li class="page-item "><a class="nav page-link next" data-next="true">Next</a></li>');
    
                this.container.after(pagination);
    
                var that = this;
                $("body").off("click", ".nav");
                this.navigator = $("body").on("click", ".nav", function() {
                    var el = $(this);
                    that.navigate(el.data("next"));
                });
    
                $("body").off("click", ".page");
                this.pageNavigator = $("body").on("click", ".page", function() {
                    var el = $(this);
                    that.goToPage(el.data("page"));
                });
            },
            navigate: function(next) {
                // default perPage to 5
                if (isNaN(next) || next === undefined) {
                    next = true;
                }
                $(".pagination .nav").removeClass("disabled");
                if (next) {
                    this.currentPage++;
                    if (this.currentPage > (this.totalPages - 1))
                        this.currentPage = (this.totalPages - 1);
                    if (this.currentPage == (this.totalPages - 1))
                        $(".pagination .nav.next").addClass("disabled");
                    }
                else {
                    this.currentPage--;
                    if (this.currentPage < 0)
                        this.currentPage = 0;
                    if (this.currentPage == 0)
                        $(".pagination .nav.prev").addClass("disabled");
                    }
    
                this.showItems();
            },
            updateNavigation: function() {
    
                var pages = $(".pagination .page");
                pages.removeClass("current");
                $('.pagination .page[data-page="' + (
                this.currentPage + 1) + '"]').addClass("current");
            },
            goToPage: function(page) {
    
                this.currentPage = page - 1;
    
                $(".pagination .nav").removeClass("disabled");
                if (this.currentPage == (this.totalPages - 1))
                    $(".pagination .nav.next").addClass("disabled");
    
                if (this.currentPage == 0)
                    $(".pagination .nav.prev").addClass("disabled");
                this.showItems();
            },
            showItems: function() {
                this.items.hide();
                var base = this.perPage * this.currentPage;
                this.items.slice(base, base + this.perPage).show();
    
                this.updateNavigation();
            },
            init: function(container, items, perPage) {
                this.container = container;
                this.currentPage = 0;
                this.totalPages = 1;
                this.perPage = perPage;
                this.items = items;
                this.createNavigation();
                this.showItems();
            }
        };
    
        // stuff it all into a jQuery method!
        $.fn.pagify = function(perPage, itemSelector) {
            var el = $(this);
            var items = $(itemSelector, el);
    
            // default perPage to 5
            if (isNaN(perPage) || perPage === undefined) {
                perPage = 3;
            }
    
            // don't fire if fewer items than perPage
            if (items.length <= perPage) {
                return true;
            }
    
            pagify.init(el, items, perPage);
        };
    })(jQuery);
    
    $("#home1").pagify(6, "#quiz");




