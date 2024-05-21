'use strict';
var KTProfileGeneral = (function () {
  var t, e, i, o;
  return {
    init: function () {
      (t = document.querySelector('#kt_followers_show_more_button')),
        (e = document.querySelector('#kt_followers_show_more_cards')),
        (i = document.querySelector('#kt_user_follow_button')),
        (o = document.querySelector('#kt_user_profile_nav')),
        t &&
          t.addEventListener('click', function (i) {
            t.setAttribute('data-kt-indicator', 'on'),
              (t.disabled = !0),
              setTimeout(function () {
                t.removeAttribute('data-kt-indicator'),
                  (t.disabled = !1),
                  t.classList.add('d-none'),
                  e.classList.remove('d-none'),
                  KTUtil.scrollTo(e, 200);
              }, 2e3);
          }),
        i &&
          i.addEventListener('click', function (t) {
            t.preventDefault(),
              i.setAttribute('data-kt-indicator', 'on'),
              (i.disabled = !0),
              i.classList.contains('btn-success')
                ? setTimeout(function () {
                    i.removeAttribute('data-kt-indicator'),
                      i.classList.remove('btn-success'),
                      i.classList.add('btn-light'),
                      i.querySelector('.svg-icon').classList.add('d-none'),
                      (i.querySelector('.indicator-label').innerHTML =
                        'Follow'),
                      (i.disabled = !1);
                  }, 1500)
                : setTimeout(function () {
                    i.removeAttribute('data-kt-indicator'),
                      i.classList.add('btn-success'),
                      i.classList.remove('btn-light'),
                      i.querySelector('.svg-icon').classList.remove('d-none'),
                      (i.querySelector('.indicator-label').innerHTML =
                        'Following'),
                      (i.disabled = !1);
                  }, 1e3);
          }),
        KTUtil.on(
          document.body,
          '[data-kt-follow-btn="true"]',
          'click',
          function (t) {
            t.preventDefault();
            var e = this,
              i = e.querySelector('.indicator-label'),
              o = e.querySelector('.following'),
              n = e.querySelector('.follow');
            e.setAttribute('data-kt-indicator', 'on'),
              (e.disabled = !0),
              n.classList.add('d-none'),
              o.classList.add('d-none'),
              setTimeout(function () {
                e.removeAttribute('data-kt-indicator'),
                  (e.disabled = !1),
                  e.classList.contains('btn-light-primary')
                    ? (e.classList.remove('btn-light-primary'),
                      e.classList.add('btn-light'),
                      n.classList.remove('d-none'),
                      (i.innerHTML = 'Follow'))
                    : (e.classList.add('btn-light-primary'),
                      e.classList.remove('btn-light'),
                      o.classList.remove('d-none'),
                      (i.innerHTML = 'Following'));
              }, 2e3);
          }
        ),
        o &&
          o.getAttribute('data-kt-sticky') &&
          KTUtil.isBreakpointUp('lg') &&
          ('1' === localStorage.getItem('nav-initialized') &&
            window.scroll({
              top: parseInt(o.getAttribute('data-kt-page-scroll-position')),
              behavior: 'smooth',
            }),
          localStorage.setItem('nav-initialized', '1'));
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTProfileGeneral.init();
});
