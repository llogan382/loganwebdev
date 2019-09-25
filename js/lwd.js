/**
 * File lwd.js.
 *
 * Main JS for the theme.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
var controller = new ScrollMagic.Controller();
var tl = new TimelineMax();

// Whereevner it starts, this is how it transitions:
tl.fromTo(
    "section.panel.turqoise",
    1,
    { xPercent: -100 },
    { xPercent: 0, ease: Linear.easeNone },
    "+=1"
);
tl.fromTo(
    "section.panel.pink",
    1,
    {
        xPercent: -100,
        yPercent: -100
    },
    {
        xPercent: 0,
        yPercent: 0, ease: Linear.easeNone
    },
    "+=1"
);
tl.fromTo(
    "section.panel.bordeaux",
    1,
    { yPercent: 100 },
    { yPercent: 0, ease: Linear.easeNone },
    "+=1"
);

new ScrollMagic.Scene({
    triggerElement: "#pinMaster", //starts the transitions
    triggerHook: "onLeave", //when scrolling out of view.
    duration: "100%"
})
    .setPin("#pinMaster") //div that starts the scrollmagic
    .setTween(tl) //run the tween function
    .addIndicators({
        // colorTrigger: "white",
        // colorStart: "white",
        // colorEnd: "white",
        // indent: 40
    })
    .addTo(controller);

