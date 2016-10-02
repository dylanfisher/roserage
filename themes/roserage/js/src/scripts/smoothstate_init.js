$(function() {
  $(document).trigger('app:ready');
});

// $(function() {
//   // smoothState is used to set up a turbolinks-style environment.
//   // https://github.com/miguel-perez/smoothState.js?files=1
//   //
//   // Don't bind events to jquery's ready event. Instead, bind them to
//   // app:ready, which is triggered on page load and after following a
//   // smoothState link.
//   //
//   // smoothState will prefetch links using the jquery hoverIntent library.
//   // This means that if you hover over a link for a short duration that
//   // link's content will be prefetched and load instantly upon clicking the link.

//   $(document).trigger('app:ready');

//   var $smoothStateContainer = $('#smoothstate-container');

//   var options = {
//     anchors: 'a',
//     scroll: false,
//     prefetch: true,
//     cacheLength: 20,
//     onBefore: function($currentTarget, $container) {
//       // The function to run before a page load is started.
//       // this.onStart.duration = 0;
//     },
//     onStart: {
//       // The function to run once a page load has been activated.
//       // This is an ideal time to animate elements that exit the page and set up for a loading state.
//       duration: 0,
//       render: function ($container) {
//         // console.log($container);
//       }
//     },
//     onReady: {
//       // The function to run when the requested content is ready to be injected into the page.
//       // This is when the page's contents should be updated.
//       duration: 0,
//       render: function ($container, $newContent) {
//         $container.html($newContent);
//       }
//     },
//     onAfter: function($container, $newContent) {
//       // The function to run when the new content has been injected into the page and all animations are complete.
//       // This is when to re-initialize any plugins needed by the page.
//       this.onStart.duration = 0;

//       $(document).trigger('app:ready');
//       $('html, body').scrollTop(0);
//     },
//   };

//   $smoothStateContainer.smoothState(options);
// });
