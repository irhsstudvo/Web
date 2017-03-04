$(document).on("ready", function() {
    /*           */
    /* FUNCTIONS */
    /*           */

    //read variable from URL
    function getURLVar(variable) {
        var query = window.location.href;
        if (query.indexOf(variable) == -1) {
            return false;
        } else {
            return query[query.indexOf(variable) + variable.length + 1];
        }
    }

    //scroll to anchor
    function scrollToAnchor(tag) {
        $('html,body').animate({
            scrollTop: tag.offset().top
        }, 1000);
    }

    // move slightly up while fading into view
    function fadeInAnimation(elem) {
        elem.css("top", "+=30px");
        elem.animate({
            'opacity': '1',
            'top': '-=30px'
        }, 1000);
    }

    //fade in object if scrolled to
    function checkFadeIn() {
        $('.fadeIn').each(function(i) {
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            if (bottom_of_window > bottom_of_object && $(this).css("opacity") == "0") {
                fadeInAnimation($(this));
                $(this).removeClass("fadeIn");
            }
        });
    }

    //remove background on scroll to prevent overlap
    function removeBG() {
        var height = $(".fullscreen-bg").outerHeight();
        var transitionTop = $('.transition').offset().top;
        //scroll past video
        if ($(window).scrollTop() > height) {
            $(".fullscreen-bg").hide();
        } else {
            $(".fullscreen-bg").show();
        }
        //scroll past transition
        if ($(window).scrollTop() > (height + transitionTop)) {
            $('body:before').css('background', 'none !important');
        } else {
            $('body:before').css('background', "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://bridgeday.000webhostapp.com/img/bridgeTeam.jpg') no-repeat center center fixed");
        }
    }

    // check if the user entered from a form submit
    function checkFormSubmit() {
        var errCode = getURLVar("error");
        if (errCode !== false) {
            if (errCode == "0") {
                $('#errorMSG').css("color", "green");
                $('#errorMSG').html('Successfully registered.');
            } else if (errCode == "1") {
                $('#errorMSG').css("color", "red");
                $('#errorMSG').html('You must complete all fields.');
            } else if (errCode == "2") {
                $('#errorMSG').css("color", "red");
                $('#errorMSG').html('Workshop choices must be different.');
            }
        }
    }

    // handle a clicked workshop card - display fancybox with info from JSON
    function workClicked(work) {
      $.fancybox({
          href: '#workPopup',
          width: 400,
          height: 350,
          autoDimensions: false,
          autoSize: false,
          afterLoad: function() {
              this.content = "";
              this.inner.prepend('<h1 class="fancyWorkTitle">' + work["title"] + '</h1>');
              this.content += '<div class="workDesc">' + work["description"] + '</div>';
          }
      });
    }

    // workshops json ordered by code with title and description
    var workshops = {
        "A1": {
            "title": "Make it or Break It? - Halton Women's Place",
            "description": "Discussion around the common things that cause conflict in relationships - such as communication (texting too much or not enough), jealousy, trust, etc. We provide scenarios and ask students to determine what is missing from the relationship and how would we fix it - as well as to decide on a personal level whether they would choose to fix it or not (letting them know it's also good to not be in a relationship!)"
        },
        "A2": {
            "title": "Resisting Toxic Media - SAVIS",
            "description": "Gender, body, image and relationships. Examines gender steotypes and their impact on self image. Explore how this affects our relationship with ourseves and others. Explain how you can push back against toxic media messages."
        },
        "A3": {
            "title": "Live, Learn, Laugh - Kimberley Menezes-Francispilla",
            "description": "The transition to high school is a journey of entering into the young adult phase of one's life. This interactive workshop will help you: a) Understand more about how teens cope and provide soem tools for coping b) Look at ways to develop healthry relationships. c) Address common worries that students experience when entering high school and how to change your worries into solvable issues."
        },
        "A4": {
            "title": "Balancing Relationships - Betty Xiong, Carrie Cho",
            "description": "The workshop talks about the importance of maintaining relationship inside and outside of school, also present ways how students can balance relationships."
        },
        "A5": {
            "title": "Q&amp;A - Ron Duberstein",
            "description": "This workshop will be lead by members of the Iroquois Ridge High School Gay-Straight Alliance, otherwise known as the Q&amp;A Club. This session will provide a safe space for any students wishing to discuss and explore a range of topics including LGBT terminology, how to create a safe space, and resources available during high school."
        },
        "A6": {
            "title": "Stereotypes in High School - GEM",
            "description": "This workshop aims to challenge stereotypes in a manner that educates, motivates and encourages students to dispute popular social stigmas and get involved in what they love! We will present an interactive Q&amp;A session, play team building activities and host a presentation on combating gender stereotypes in accordance with clubs, courses, and general school life."
        },
        "B1": {
            "title": "Mirror Mirror - Halton Women's Place",
            "description": "Mirror Mirror - Body image, self-esteem, photoshop and filters, advertising, and the impact on our mental health."
        },
        "B2": {
            "title": "Mental Health at The Ridge - Wellness Team",
            "description": "Ever feel stressed and don’t know how to cope? Ever wonder how to slow down your hectic life and take a break? Well you’ve come to the right place. This workshop will guide you through multiple techniques on distressing along with educating you about the multiple resources provided at the Ridge and community for your mental health support."
        },
        "B3": {
            "title": "Music As Medicine For Mental Health - Joob Vailiki",
            "description": "This workshop will use interactive exercises including singing and clapping to encourage and inspire comfort and connection between peers. Using musical elements such as: rhythm, harmony, unison, to illustrate communication and listening. Teaching about how to channel emotions in a positive way, encouraging self-expression and stress relief. We are all unique individuals with our own stresses and worries. However, one thing that's universal is the therapeutic and healing properties of music."
        },
        "B4": {
            "title": "Break down the Roles - Red Cross Youth Facilitators",
            "description": "We are bringing to light the impacts of bullying on the people involved in a bullying situation. Students will learn that they have the power to help others and create a school that is free of bullying. We have group activities in which students will be analyzing bullying scenarios and discussing as a group the feelings associated with the different roles in bullying."
        },
        "B5": {
            "title": "Resolution: Confidence - Jenn Patterson",
            "description": "Jennifer Patterson has suffered from low self esteem for as long as she can remember. This ultimately led to a lack of confidence and an eating disorder. She will discuss her journey to recovery and her process of discovering that if you keep fighting you can reach a place that een you didn't think was possible."
        },
        "B6": {
            "title": "The Daring Way - Melissa Vance",
            "description": 'Is fear stopping you from doing what you love? Are you worried about what others think? Is anxiety holding you back? In this workshop we will talk about shame, self-limiting beliefs, negative self-talk and behaviours that are holding us back from living our best life. You will learn how to identify your triggers and what is really happening in your body. "The most courageous thing we can do is DARE to live the life of our dreams".'
        }
    }

    /*            */
    /*    MAIN    */
    /*            */
    checkFadeIn();
    checkFormSubmit();

    // on window scroll, fade item if in view and remove background if passed
    $(window).scroll(function() {
        checkFadeIn();
        removeBG();
    });

    // red arrow and text on hover, else white
    $('#downArrowWrapper').hover(function() {
        $('#downArrow g path').css("fill", "red");
        $('figcaption').css("color", "red");
    }, function() {
        $('#downArrow g path').css("fill", "white");
        $('figcaption').css("color", "white");
    });

    // scroll to second section if arrow clicked
    $('#downArrowWrapper').on("click", function() {
        scrollToAnchor($('.second'));
    });

    // open fancybox when user clicks on workshop card
    $('.mdl-card').on("click", function(e) {
        e.preventDefault();
        workClicked(workshops[e.currentTarget.parentElement.id]);
    });

});
