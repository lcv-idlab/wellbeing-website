import $ from 'jquery';
import anime from 'animejs';
import Flickity from 'flickity';
import mostVisible from 'most-visible';

mostVisible.makeJQueryPlugin( $ );
window.jQuery = $;

require('@fancyapps/fancybox');

$(() => {
  if($('.slideshow').length) {
    new Flickity('.slideshow', {
      adaptiveHeight: false,
      autoPlay: 3000,
      dragThreshold: 10
    })
  }

  if($('.newspreviews .slide').length > 2) {
    new Flickity('.newspreviews', {
      cellAlign: 'left',
      prevNextButtons: false,
      groupCells: true,
      dragThreshold: 10
    })
  }

  let menuopen = false;

  $('.hamburger').on('click', function() {

    if(menuopen === false) {
      anime({
        targets: '.mobilemenu',
        top: 0,
        easing: 'easeInOutQuart',
        duration: 400
      });

      anime({
        targets: '.hamburger path',
        stroke: ['#000', '#fff'],
        duration: 300,
        d: (el, i) => {
          switch(i) {
            case 2: return 'M3.5 3.5 L6.5 6.5';
            case 0: return 'M5 5 L5 5';
            case 1: return 'M3.5 6.5 L6.5 3.5';
          }
        },
        easing: 'linear'
      });
    } else {
      anime({
        targets: '.mobilemenu',
        top: '-100vh',
        easing: 'easeInOutQuart',
        duration: 400
      });

      anime({
        targets: '.hamburger path',
        stroke: ['#fff', '#000'],
        duration: 300,
        d: (el, i) => {
          switch(i) {
            case 0: return 'M2 3.5 L8 3.5';
            case 1: return 'M2 5 L8 5';
            case 2: return 'M2 6.5 L8 6.5';
          }
        },
        easing: 'linear'
      });
    }

    menuopen = !menuopen;
  })
})


if (window.innerWidth >= 1200) { 
  $(() => {
    let nav = $('nav');

    if(nav.find('.anchors').length) {
      let links = nav.find('.anchors a');
      let targets = links.map(function(i, el) {
        let r = $(el.getAttribute('href')).parent();
        r.data('link', el); 
        return r[0]
      });

      $(window).on('scroll', function() {
        let active = $(targets).mostVisible({percentage: true}).data('link');
        if(!$(active).hasClass('active')) {
          links.removeClass('active');
          $(active).addClass('active');
        }

        if($(window).scrollTop() > 100) {
          nav.addClass('scrolled');
        } else {
          nav.removeClass('scrolled');
        }
      });

      links.click(function(e){
        e.preventDefault();
        let target = $(this.getAttribute('href'));
        let top = target.offset().top;
        top = Math.min($('html').height() - window.innerHeight, top);
        $("html, body").stop(true).animate({
          scrollTop: top
        }, 1000);
      })
    }
  })
}

if (window.innerWidth >= 1600) {
  $(() => {
    $('body').on('mousewheel', function() {
      $('html,body').stop(true);
    })
  })
}