<?php
    //what to show-----------------------------------------------------------------
    //session_start()
    $challenges = '
        [
            {
                "id" : "1",
                "point" : "1",
                "module" : "poo",
                "story" : "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "nbOfQuestions" : "1",
                "nbPersonSolved" : "1",
                "resource" : [{"nom" : "wiki", "url" : "fb.com"}, {"nom" : "cours pdf", "url" : "jahob.com"}]
            },
            {
                "id" : "2",
                "point" : "3",
                "module" : "math",
                "story" : "ghjk",
                "nbOfQuestions" : "2",
                "nbPersonSolved" : "2",
                "resource" : [{"nom" : "moussa", "url" : "moussa.com"}]
            },
            {
                "id" : "157",
                "point" : "5",
                "module" : "phys",
                "story" : "ghjk",
                "nbOfQuestions" : "3",
                "nbPersonSolved" : "3",
                "resource" : [{"nom" : "omar", "url" : "omar.com"}]
            },
            {
                "id" : "157",
                "point" : "7",
                "module" : "algo",
                "story" : "ghjk",
                "nbOfQuestions" : "4",
                "nbPersonSolved" : "5",
                "resource" : [{"nom" : "haroune", "url" : "haroune.com"}]
            },
            {
                "id" : "10",
                "point" : "9",
                "module" : "something",
                "story" : "ghjk",
                "nbOfQuestions" : "5",
                "nbPersonSolved" : "7",
                "resource" : [{"nom" : "seyf", "url" : "seyf.com"}]
            }

        ]
    ';
    // there is a problem in json notation concerning the resource
    $challenges = json_decode($challenges);

    
       
?>