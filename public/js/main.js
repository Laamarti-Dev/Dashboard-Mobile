/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initSlimscroll() {
        $('.slimscroll').slimscroll({
            height: 'auto',
            position: 'right',
            size: "7px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 50
        });
    }

    function initMetisMenu() {
        $('.navbar-toggle').on('click', function (event) {
            $(this).toggleClass('open');
            $('#navigation').slideToggle(400);
        });

        $('.navigation-menu>li').slice(-2).addClass('last-elements');

        $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
            }
        });


    }


    function initLeftMenuCollapse() {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarge-menu");
            initSlimscroll();
        });
    }

    function initEnlarge() {
        if ($(window).width() < 1023) {
            $('body').addClass('enlarge-menu');
        } else {
            if ($('body').data('keep-enlarged') != true)
                $('body').removeClass('enlarge-menu');
        }
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $(".navigation-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().parent().parent().addClass("active"); // add active class to an anchor
            }
        });
    }




    function init() {
        initSlimscroll();
        initMetisMenu();
        initLeftMenuCollapse();
        initEnlarge();
        initActiveMenu();
        Waves.init();
    }

    init();

    // #################
    // Start Page Console Developer
    // #################

    // click Button about
    $('.console-about').on('click',function () {

        var id              = $(this).parents('td').data('id');
        var email           = $('#email_about');
        var emailRecovery   = $('#emailRecovery_about');
        var password        = $('#password_about');
        var country         = $('#country_about');
        var state           = $('#state_about');
        var city            = $('#city_about');
        var ip              = $('#ip_about');
        var latitude        = $('#latitude_about');
        var longitude       = $('#longitude_about');
        var openMethod      = $('#method_about');
        var cardNumber      = $('#cardNumber_about');
        var phone           = $('#phone_about');
        var active          = $('#radio-12');
        var suspend         = $('#radio-13');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.data-application').html('');

        // Get Information about Console
        $.ajax({
            url: '/console/accounts/get',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {

                email.attr("value",data[0].email);
                emailRecovery.attr("value",data[0].email_Recovery);
                password.attr("value",data[0].password);
                country.attr("value",data[0].country);
                state.attr("value",data[0].state);
                city.attr("value",data[0].city);
                ip.attr("value",data[0].ip);
                latitude.attr("value",data[0].latitude);
                longitude.attr("value",data[0].longitude);
                openMethod.attr("value",data[0].open_Method);
                cardNumber.attr("value",data[0].card_Number);
                phone.attr("value",data[0].phone);

                if(data[0].status == 0){
                    suspend.attr("checked",true);
                }else{
                    active.attr("checked",true);
                }
            }
        });

        // Get All Application publish in Console Developer
        $.ajax({
            url: '/console/accounts/application/get',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {
                for (var i = 0; i < data.length; i++){

                    var st = '';
                    if(data[i].status == 1)
                        st ='<span class="badge badge-success">Active</span>';
                    else
                        st = '<span class="badge badge-danger">Suspend</span>';

                    $('.data-application').html(
                        '<tr>' +
                            '<td><img src="'+ data[i].icon+'" alt="" class="rounded-circle thumb-sm mr-1"></td>' +
                            '<td>'+data[i].name+'</td>' +
                            '<td>'+data[i].installs +'</td>'  +
                            '<td>'+data[i].date_P+'</td>'  +
                            '<td>'+st+'</td>' +
                            '<td><a href="/application/about/id/'+data[i].id +'/console/'+data[i].id_console+'" class="badge badge-default">Read More</a></td>' +
                        '</tr>');
                }
            }
        });


    });

    // click Button Edit
    $('.console-edit').on('click',function () {

        var id              = $(this).parents('td').data('id');
        var id_edit         = $('#id_edit');
        var email           = $('#email_console_edit');
        var emailRecovery   = $('#email_console_edit_recovery');
        var password        = $('#password_console_edit');
        var country         = $('#country_console_edit');
        var state           = $('#state_console_edit');
        var city            = $('#city_console_edit');
        var ip              = $('#ip_console_edit');
        var latitude        = $('#latitude_console_edit');
        var longitude       = $('#longitude_console_edit');
        var openMethod      = $('#method_console_edit');
        var cardNumber      = $('#cardNumber_console_edit');
        var phone           = $('#phone_console_edit');
        var active          = $('#radio-20');
        var suspend         = $('#radio-21');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $('.alert-lm').hide();

        // Get Information about Console
        $.ajax({
            url: '/console/accounts/get',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {

                id_edit.attr("value",data[0].id);
                email.attr("value",data[0].email);
                emailRecovery.attr("value",data[0].email_Recovery);
                password.attr("value",data[0].password);
                country.attr("value",data[0].country);
                state.attr("value",data[0].state);
                city.attr("value",data[0].city);
                ip.attr("value",data[0].ip);
                latitude.attr("value",data[0].latitude);
                longitude.attr("value",data[0].longitude);
                openMethod.attr("value",data[0].open_Method);
                cardNumber.attr("value",data[0].card_Number);
                phone.attr("value",data[0].phone);

                if(data[0].status == 0){
                    suspend.attr("checked",true);
                }else{
                    active.attr("checked",true);
                }
            }
        });

    });

    // click Button Delete
    $('.console-delete').on('click',function () {
        var id = $(this).parents('td').data('id');
        $('#id_delete').attr("value",id);
    });
    // #################
    // End Page Console Developer
    // #################


    // #################
    // Start Page My Application
    // #################

    $('#btn_add_app').on('click',function () {
        $('.alert-lm').hide();
    });

    $('.getData').on('click',function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.getData span').show();
        $('.getData i').hide();
        $('.getData').attr('disabled',true);

        $.ajax({
            url: '/application/get/data',
            type: 'GET',
            data: {_token: CSRF_TOKEN},
            dataType: 'html',
            success: function (data) {

                if(data == 'true') {
                    $('.getData span').hide();
                    $('.getData i').show();
                    $('.getData').attr('disabled', false);
                    location.reload();
                }else
                    alert(data);

            }
        });

    });
    // #################
    // End Page My Application
    // #################


    // #################
    // Start Page My Niche
    // #################

    // click Button Add
    $('#btn_add_niche').on('click',function () {
        $('.alert-lm').hide();
    });

    // click Button Delete
    $('.niche-delete').on('click',function () {
        var id = $(this).parents('td').data('id');
        $('#id_delete').attr("value",id);
    });


    // click Button Edit
    $('.niche-edit').on('click',function () {

        var id              = $(this).parents('td').data('id');
        var id_edit         = $('#id');
        var name            = $('#nicheNameEdit');
        var category        = $('#nicheCategoryEdit');
        var Good             = $('#radio-20');
        var Bad             = $('#radio-21');
        var New            = $('#radio-22');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $('.alert-lm').hide();

        // Get Information about Console
        $.ajax({
            url: '/niche/about/get',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {

                id_edit.attr("value",data[0].id);
                name.attr("value",data[0].name);
                category.val(data[0].category);

                tinymce.get("elm1").setContent(data[0].about);


                if(data[0].status === 'Good Niche')
                    Good.attr("checked",true);

                if(data[0].status === 'Bad Niche')
                    Bad.attr("checked",true);

                if(data[0].status === 'New Niche')
                    New.attr("checked",true);
            }
        });

    });
    // #################
    // End Page My Niche
    // #################


    // #################
    // Start Page Ads Accounts
    // #################

    // click Button Add
    $('#btn_add_ads').on('click',function () {
        $('.alert-lm').hide();
    });

    // click Button Edit
    $('.adsAcc-edit').on('click',function () {

        var id              = $(this).parents('td').data('id');
        var id_edit         = $('#id');
        var email           = $('#email_ads_edit');
        var emailRecovery   = $('#email_ads_edit_recovery');
        var password        = $('#password_ads_edit');
        var country         = $('#country_ads_edit');
        var state           = $('#state_ads_edit');
        var city            = $('#city_ads_edit');
        var ip              = $('#ip_ads_edit');
        var latitude        = $('#latitude_ads_edit');
        var longitude       = $('#longitude_ads_edit');
        var adress          = $('#adress_ads_edit');
        var platforms       = $('#Platforms_ads_edit');
        var phone           = $('#phone_ads_edit');
        var id_ads          = $('#id_ads_edit');
        var pin_true          = $('#radio-201');
        var pin_false         = $('#radio-200');
        var active          = $('#radio-30');
        var suspend         = $('#radio-31');

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $('.alert-lm').hide();

        // Get Information about Console
        $.ajax({
            url: '/adsAccount/about/get',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {

                id_edit.attr("value",data[0].id);
                email.attr("value",data[0].email);
                emailRecovery.attr("value",data[0].email_Recovery);
                password.attr("value",data[0].password);
                country.attr("value",data[0].country);
                state.attr("value",data[0].state);
                city.attr("value",data[0].city);
                ip.attr("value",data[0].ip);
                latitude.attr("value",data[0].latitude);
                longitude.attr("value",data[0].longitude);
                adress.attr("value",data[0].adress);
                platforms.val(data[0].monetization);
                id_ads.attr("value",data[0].id_ads);
                phone.attr("value",data[0].phone);

                if(data[0].status == 0){
                    suspend.attr("checked",true);
                }else{
                    active.attr("checked",true);
                }



                if(data[0].pinCode === 'False')
                    pin_false.attr("checked",true);

                if(data[0].pinCode === 'True')
                    pin_true.attr("checked",true);

            }
        });

    });

    // click Button Delete
    $('.adsAcc-delete').on('click',function () {
        var id = $(this).parents('td').data('id');
        $('#id_delete').attr("value",id);
    });

    // click Button Delete
    $('.adsAcc-about').on('click',function () {
        var id = $(this).parents('td').data('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('.data-application').html('');

        // Get All Application Ads
        $.ajax({
            url: '/adsAccount/get/all',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {

                for (var i = 0; i < data.length; i++){

                    var st = '';
                    if(data[i].status == 1)
                        st ='<span class="badge badge-success">Active</span>';
                    else
                        st = '<span class="badge badge-danger">Suspend</span>';

                    $('.data-application').html(
                        '<tr>' +
                        '<td>'+st+'</td>' +
                        '<td><img src="'+ data[i].icon+'" alt="" class="rounded-circle thumb-sm mr-1"></td>' +
                        '<td><a href="https://play.google.com/store/apps/details?id='+data[i].packageName +'">'+data[i].name+'</a></td>' +
                        '<td>'+data[i].installs +'</td>'  +
                        '</tr>');
                }
            }
        });


    });


    // #################
    // End Page Page Ads Accounts
    // #################

    // #################
    // Start Page Ads Settings
    // #################
    $('.edit-ads').on('click',function () {

        var id              = $(this).parents('td').data('id');
        var id_edit         = $('#id');
        var id_app          = $('#id_app');
        var id_ads          = $('#id_ads');
        var banner          = $('#banner');
        var interstitial    = $('#interstitial');
        var rewarded        = $('#rewarded');
        var native          = $('#native');
        var active          = $('#radio-21');
        var suspend         = $('#radio-22');

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.alert-lm').hide();

        // Get Information about Console
        $.ajax({
            url: '/ads/about/get',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id:id},
            dataType: 'JSON',
            success: function (data) {

                id_edit.attr("value",data[0].id);
                banner.attr("value",data[0].banner);
                interstitial.attr("value",data[0].interstitial);
                rewarded.attr("value",data[0].rewarded);
                native.attr("value",data[0].native);

                id_app.selectpicker('val', data[0].id_apps);

                id_ads.selectpicker('val', data[0].id_ads);

                if(data[0].status == 0){
                    suspend.attr("checked",true);
                }else{
                    active.attr("checked",true);
                }

            }
        });

    });

    $('.delete-ads').on('click',function () {
        var id = $(this).parents('td').data('id');
        $('#id_delete').attr("value",id);
    });

    $('.id_console').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
        var selected = $(e.currentTarget).val();
        alert(selected);
    });

    $('#example').DataTable();


    // #################
    // End Page Settings
    // #################




})(jQuery)
