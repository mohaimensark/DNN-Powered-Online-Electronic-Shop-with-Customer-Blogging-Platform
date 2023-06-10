// Import GSAP library
import { TweenMax } from "gsap";

// Select the box element
const box = document.querySelector(".box");

// Create animation
TweenMax.to(box, 1, {
  x: 200,

  y: 200,
  rotation: 360,
  scale: 2,
  ease: "bounce.out",
});
