// including popper
// include ../../../../env/node_modules/popper.js/dist/popper.min.js
// including bootstrap
//=include ../../../../env/node_modules/bootstrap/dist/js/bootstrap.js
// including wowjs
//=include ../../../../env/node_modules/wowjs/dist/wow.min.js

jQuery(document).ready(function ($) {

    // мягкий скрол на ссылках
    $("body").on("click", ".link__slow", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();
        //забираем идентификатор бока с атрибута href
        var id = $(this).attr('href'),
            //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;
        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 500);
    });
// мобильное меню
    $(".hamburger").click(function () {
        $("#menu").toggleClass("mobileMenu_show");
    });
    $("#menu li").click(function () {
        $("#menu").removeClass("mobileMenu_show");
    });

    // капча ------ следует убрать
    $(function () {
        $('.g-recaptcha').hide();
        $("#button").click(function () {
            $('.g-recaptcha').show();
        })
    })
// подсветка выбраной категории в портфолио
    $(function () {
        $(".controls li").click(function () {
            $(".controls li").removeClass("active");
            $(this).addClass("active");
        })
    })


});


/**
 * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
 *
 * @private
 * @author Todd Motto
 * @link https://github.com/toddmotto/foreach
 * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
 * @callback requestCallback      callback   - Callback function for each iteration.
 * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
 * @returns {}
 */
let forEach = function (t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t)) for (let c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t); else for (let e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};
let hamburgers = document.querySelectorAll(".hamburger");

if (hamburgers.length > 0) {
    forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}


/*
to top button
*/
// When the user scrolls down 200px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("BtnTOP").style.display = "block";
    } else {
        document.getElementById("BtnTOP").style.display = "none";
    }
    ;
};
(function ($) {
    $(function () {

        $('#BtnTOP').click(function () {
            $('html, body').animate({scrollTop: 0}, 500);
            return false;
        })

    })
})(jQuery)


let mobileMEnu = document.getElementById("menu");
let WWidht = window.innerWidth;

if (WWidht <= 768) {
    mobileMEnu.classList.add("mobileMenu_hide");
} else {
    mobileMEnu.classList.remove("mobileMenu_hide");
}

console.log('Developed by Alexander Kulnyow to dds.by');
console.log('Designed by Alexandra Betenya to dds.by');
console.log(WWidht);
