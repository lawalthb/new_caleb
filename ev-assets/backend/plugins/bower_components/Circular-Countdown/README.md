# CircularCountDownJs

A modern, beautiful, and customizable circular jQuery countdown

## Demo

A demo is available on JSFiddle [here](https://jsfiddle.net/sygmaa/3gq88aL2/).

## Documentation

### How to intall CircularCountDownJs ?

Just add this to your html :

```html
<script type="text/javascript" src="https://cdn.rawgit.com/sygmaa/CircularCountDownJs/master/circular-countdown.min.js"></script>
```

### How to use it ?

It's very simple, just create an HTML element like :
```html
<div class="timer"></div>
```

In Javascript, run the countdown with :
```javascript
$('.timer').circularCountDown({
  duration: {
      seconds: 10
  }
});
```

### More options

```javascript
$('.timer').circularCountDown(function (){

    // Size of the circle
    size: 60,

    // Size of the border
    borderSize: 10,

    // Color of the circle border
    colorCircle: 'gray',

    // Background behind the text
    background: 'white',

    // Font of the text
    fontFamily: 'sans-serif',

    // Color of the text
    fontColor: '#333333',

    // Size of the font (px)
    fontSize: 16,

    // Delay to make a jQuery 'fadeIn' animation at the start
    delayToFadeIn: 0,

    // Delay to make a jQuery 'fadeOut' animation at the end
    delayToFadeOut: 0,

    // The loading
    reverseLoading: false,

    // Reverse the direction of the rotation (Not yet available)
    reverseRotation: false,

    // Duration of the countdown
    duration: {
        hours: 0,
        minutes: 0,
        seconds: 10
    },

    // Function call before the countdown
    beforeStart: function(){},

    // Function call after the countdown
    end: function(){}
});
```

> **Note :** All values for described options are default values.

## License
CircularCountDownJs in under a [MIT License](https://opensource.org/licenses/MIT).

## Report a bug
If you discover any bug, please use the issues tracker.
