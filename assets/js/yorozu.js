function setTopSlideHeight(elm) {
  elm.style.height = window.innerWidth * 0.34 + "px";
  return false;
}

function getYPosition() {
  var top = window.pageYOffset || document.documentElement.scrollTop;
  return top;
}

function getURL() {
  return window.location.href;
}

function setHeights() {
  /******************************
   *
   *
   * set cordinator height
   *
   *
   ******************************/
  if (is_pc()) {
    try {
      const targets = document.getElementsByClassName(
        "coordinator-list__genre"
      );
      let temph,
        heighest = 0;

      //initialize
      Array.prototype.forEach.call(targets, function (e) {
        e.style.height = "auto";
      });

      //get
      Array.prototype.forEach.call(targets, function (e) {
        temph = e.clientHeight;
        if (temph > heighest) {
          heighest = temph;
        }
      });

      //set
      Array.prototype.forEach.call(targets, function (e) {
        e.style.height = heighest + "px";
      });
    } catch (e) {}

    try {
      const targets_02 = document.getElementsByClassName(
        "coordinator-list__title"
      );
      let temph_02,
        heighest_02 = 0;
      //initialize
      Array.prototype.forEach.call(targets_02, function (e) {
        e.style.height = "auto";
      });
      //get
      Array.prototype.forEach.call(targets_02, function (e) {
        temph_02 = e.clientHeight;
        if (temph_02 > heighest_02) {
          heighest_02 = temph_02;
        }
      });
      //set
      Array.prototype.forEach.call(targets_02, function (e) {
        e.style.height = heighest_02 + "px";
      });
    } catch (e) {}
  }
}
(function () {
  /******************************
   *
   *
   *  change top visual height
   *
   *
   ******************************/
  const topSlide = document.getElementById("top-slide");
  const backToTop = document.getElementById("back_to_top");

  /*
   * run as window is scrolled
   */
  window.onscroll = function () {
    if (500 < getYPosition()) {
      backToTop.classList.add("show");
    } else {
      backToTop.classList.remove("show");
    }
  };

  if (topSlide != undefined) {
    //  setTopSlideHeight(topSlide);
    /*
     * run as window is loaded
     */
    window.onload = function (event) {
      // setTopSlideHeight(topSlide);
    };

    /*
     * run as window is resized
     */
    window.onresize = function (event) {
      // setTopSlideHeight(topSlide);
    };

    /*
     * run as window is orientated
     */
    window.onorientationchange = function (event) {
      // setTopSlideHeight(topSlide);
    };
  }

  /******************************
   *
   *
   *  change coordinator's name color
   *
   *
   ******************************/
  const coordinator_titles = document.getElementsByClassName(
    "coordinator-list__title"
  );
  if (coordinator_titles != undefined) {
    Array.prototype.forEach.call(coordinator_titles, function (e) {
      var e_text = e.innerHTML;
      if (e_text.includes("チーフ")) {
        e.classList.add("co_leader");
      }
      if (e_text.includes("経営系")) {
        e.classList.add("co_management");
      }
      if (e_text.includes("技術系")) {
        e.classList.add("co_technical");
      }
      if (e_text.includes("販路")) {
        e.classList.add("co_development");
      }
      if (e_text.includes("ミドルオフィス")) {
        e.classList.add("co_middle_office");
      }
    });
  }

  /******************************
   *
   *
   * back to top smoothly
   *
   *
   ******************************/
  var backbutton = document.getElementsByClassName("js-to-top");
  backbutton[0].addEventListener("click", function () {
    scrollToTop(500);
  });

  function scrollToTop(duration) {
    // cancel if already on top
    var scrollElement =
      "scrollingElement" in document
        ? document.scrollingElement
        : document.documentElement;
    if (scrollElement.scrollTop === 0) return;

    const cosParameter = scrollElement.scrollTop / 2;
    var scrollCount = 0,
      oldTimestamp = null;

    function step(newTimestamp) {
      if (oldTimestamp !== null) {
        // if duration is 0 scrollCount will be Infinity
        scrollCount += (Math.PI * (newTimestamp - oldTimestamp)) / duration;
        if (scrollCount >= Math.PI) return (scrollElement.scrollTop = 0);
        scrollElement.scrollTop =
          cosParameter + cosParameter * Math.cos(scrollCount);
      }
      oldTimestamp = newTimestamp;
      window.requestAnimationFrame(step);
    }
    window.requestAnimationFrame(step);
  }

  /******************************
   *
   *
   * add class to current menu
   *
   *
   ******************************/
  function addClasstoCurrent() {
    const global_nav = document.querySelectorAll(".global_nav__list li a");

    for (var i = 0; i < global_nav.length; i++) {
      var anchr = global_nav[i].href;
      if (anchr == getURL()) {
        global_nav[i].classList.add("current");
      }
    }

    return false;
  }

  addClasstoCurrent();

  /******************************
   *
   *
   * remove "-" from Event time
   *
   *
   ******************************/
  try {
    const event_time = document.querySelector(".eo-event-meta li:first-child");
    event_time.innerHTML = event_time.innerHTML.replace("–", "");
  } catch (e) {}

  /******************************
   *
   *
   * get day and add to the Event attribute
   *
   *
   ******************************/
  //single page
  try {
    const event_time = document.querySelector("time[itemprop='startDate']");
    const event_time_txt = event_time.getAttribute("datetime");
    console.log(event_time_txt);
    event_time.innerHTML = event_time.innerHTML.replace(
      "日",
      "<span class='modified_day'>日</span>"
    );
    const modified_day = document.querySelector(".modified_day");
    modified_day.innerHTML =
      modified_day.innerHTML + getPostDay(event_time_txt);
  } catch (e) {}

  //top and archive
  try {
    const archive_date = document.getElementsByClassName("add_day_after");
    Array.prototype.forEach.call(archive_date, function (e) {
      e.innerHTML = e.innerHTML + getPostDay(e.innerText);
    });
  } catch (e) {}

  function getPostDay(date) {
    const days = ["(日)", "(月)", "(火)", "(水)", "(木)", "(金)", "(土)"];
    const inputYear = date.slice(0, 4);
    const inputMonth = date.slice(5, 7);
    const inputDate = date.slice(8, 10);
    const dObj = new Date(inputYear, inputMonth - 1, inputDate);
    return days[dObj.getDay()];
  }

  /******************************
   *
   *
   * convert titles br to break line
   *
   *
   ******************************/
  let le_counter = 0;
  function convertTitleBr() {
    //stop after 10 times
    if (le_counter > 15) return;
    // Get all elements with class "fc-title"
    const targets = document.getElementsByClassName("fc-title");
    // For each element with class "fc-title"
    Array.prototype.forEach.call(targets, function (e) {
      // Replace all <br> tags with <br>
      e.innerHTML = e.innerText.replace("<br>", "<br>");
    });
    // If there are no elements with class "fc-title", try again in 100ms
    if (targets.length == 0) {
      setTimeout(convertTitleBr, 100);
    }
    le_counter++;
  }

  // When the user clicks anywhere on the page
  window.addEventListener("click", function (event) {
    // If the user clicked on an icon or button
    if (
      event.target.classList.contains("fc-icon") ||
      event.target.classList.contains("fc-button")
    ) {
      // Convert all <br> tags to <br>
      le_counter = 0;
      convertTitleBr();
    }
  });

  // Convert all <br> tags to <br> on page load
  convertTitleBr();

  //
  // set event title
  function setEventTitle() {
    const event_title = document.getElementsByClassName("textarea_event_title");
    console.log(event_title);
    // set placeholder to its value
    Array.prototype.forEach.call(event_title, function (e) {
      e.value = e.placeholder;
      //make it uneditable
      e.setAttribute("readonly", "readonly");
    });
  }
  setEventTitle();
  //
  // add_participant_btn
  function addParticipantInput() {
    const add_participant_btn = document.getElementsByClassName(
      "add_participant_btn"
    );
    if (add_participant_btn.length < 1) {
      return;
    }
    add_participant_btn[0].addEventListener("click", function () {
      //add
      const opens = document.querySelectorAll(".participant_input.show");
      // get last participant input
      const last_participant_input = opens[opens.length - 1];
      // get next element
      const next_sibling = last_participant_input.nextElementSibling;
      // if next sibling is not null, add participant input
      if (next_sibling != null) {
        next_sibling.classList.add("show");
        next_sibling.removeAttribute("disabled");
      }
      checkButtonStatus();
    });
    const remove_participant_btn = document.getElementsByClassName(
      "add_participant_btn--minus"
    );
    remove_participant_btn[0].addEventListener("click", function () {
      //remove
      const opens = document.querySelectorAll(".participant_input.show");
      // get last participant input
      const last_participant_input = opens[opens.length - 1];
      // get previous element
      // if previous sibling is not null, remove participant input
      if (last_participant_input != null) {
        last_participant_input.classList.remove("show");
        console.log(last_participant_input);
        const last_participant_input_item =
          last_participant_input.querySelectorAll("input");
        //loop through
        Array.prototype.forEach.call(last_participant_input_item, function (e) {
          console.log(e);
          e.value = "";
        });
        //last_participant_input.setAttribute("disabled", "disabled");
      }
      checkButtonStatus();
    });

    function checkButtonStatus() {
      const participant_inputs = document.querySelectorAll(
        ".participant_input.show"
      );
      if (participant_inputs.length > 2) {
        add_participant_btn[0].disabled = true;
        add_participant_btn[0].classList.add("disabled");
      } else {
        add_participant_btn[0].disabled = false;
        add_participant_btn[0].classList.remove("disabled");
      }
      console.log(participant_inputs.length);
      if (participant_inputs.length < 2) {
        remove_participant_btn[0].disabled = true;
        remove_participant_btn[0].classList.add("disabled");
      } else {
        remove_participant_btn[0].disabled = false;
        remove_participant_btn[0].classList.remove("disabled");
      }
    }
    checkButtonStatus();
  }
  addParticipantInput();

  //
  // disable radio buttons
  function disableRadioButtons() {
    const radio_buttons = document.querySelectorAll(".form_reasons__radio");
    Array.prototype.forEach.call(radio_buttons, function (e) {
      e.checked = false;  
      e.disabled = true;
      e.required = false;
    });
  }
  //
  // enable radio buttons
  function enableRadioButtons() {
    const radio_buttons = document.querySelectorAll(".form_reasons__radio");
    Array.prototype.forEach.call(radio_buttons, function (e) {
      e.disabled = false;
    });
  }
  //
  // detect if the input field is on blur
  function detectBlur() {
    const input_field = document.getElementById("apply_reason_else");
    input_field.addEventListener("blur", function () {
      if (input_field.value == "") {
        enableRadioButtons();
      } else {
        disableRadioButtons();
      }
    });
  }
  //detectBlur();

//
  // detect if else is checked
  function detectElse() {
    let temp_value = "";
    const radio_buttons = document.querySelectorAll(".form_reasons__radio");
    const radio_buttons_else = document.querySelector(".form_reasons__radio[value='その他']");
    const input_field = document.getElementById("apply_reason_else");
    const apply_reason_else_wrap = document.querySelector(".apply_reason_else_wrap");
    if(input_field == null) {
      return;
    }
    //add event listener to each radio button
    Array.prototype.forEach.call(radio_buttons, function (e) {
      e.addEventListener("change", function () {
       console.log(e.value);
       if(e.value == "その他") {
        input_field.value = temp_value;
       } else {
        if(input_field.value != "") {
          temp_value = input_field.value;
          input_field.value = "";
        }
       }
      });
    });
    console.log(apply_reason_else_wrap);
    input_field.addEventListener("focus", function () {
      radio_buttons_else.checked = true;
      input_field.value = temp_value;
    });
  }
  detectElse();

})();
//onload
window.addEventListener("load", function () {
  setHeights();
});

//onresize
window.addEventListener("resize", function () {
  setHeights();
});
