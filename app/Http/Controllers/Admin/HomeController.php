<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function autoPost(Request $request)
    {
        $dec1 = '';

        if ($request->has('body')) {
            $myArray = explode(',', $request->get('body'));
            $dec1 = $this->getFirstStringArray($myArray[0]);
            $dec1 = $dec1.' '.$this->getStringArray($myArray[1]);
            $dec1 = $dec1.' '.$this->getStringArray($myArray[2]);
            $dec1 = $dec1.' '.$this->getStringArray($myArray[3]);
            if (rand(1,10) % 2 == 0) {
              $dec1 = $dec1.' '.$this->getLastStringArray($myArray[4]);
            }
        }

        return view('admin.autoPost.autoPost', compact('dec1'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function getFirstStringArray($words){
        $myArray = [
            "Today our leading topic is {words}.",
            "In this post, we will learn {words}.",
            "Here, I will show you {words}.",
            "Here, I will show you how to works {words}.",
            "In this tutorial, I will show you {words}.",
            "In this example, I will show you {words}.",
            "This article will provide some of the most important example {words}.",
            "This article will provide example of {words}.",
            "This tutorial will provide example of {words}.",
            "This tutorial will give you example of {words}.",
            "This article will give you example of {words}.",
            "This post will give you example of {words}.",
            "In this example, you will learn {words}.",
            "Are you looking for example of {words}.",
            "If you need to see example of {words}.",
            "Today, I will let you know example of {words}.",
            "Today, I would like to show you {words}.",
            "In this tutorial, you will learn {words}.",
            "This article is focused on {words}.",
            "This tutorial is focused on {words}.",
            "This post is focused on {words}.",
            "This example is focused on {words}.",
            "In this tute, we will discuss {words}.",
            "Now, let's see tutorial of {words}.",
            "Now, let's see article of {words}.",
            "Now, let's see post of {words}.",
            "Now, let's see example of {words}.",
            "This tutorial shows you {words}.",
            "In this quick example, let's see {words}.",
            "Today, {words} is our main topic.",
            "I am going to explain you example of {words}.",
            "I am going to show you example of {words}.",
            "I will explain step by step tutorial {words}.",
            "This is a short guide on {words}.",
            "Hello all! In this article, we will talk about {words}.",
            "In this short tutorial we will cover an {words}.",
            "This article goes in detailed on {words}.",
            "This simple article demonstrates of {words}.",
            "In this tutorial we will go over the demonstration of {words}.",
            "In this article we will cover on how to implement {words}.",
        ];

        $randomKey = rand(0, count($myArray) - 1);

        $value = $myArray[$randomKey];

        return str_replace('{words}', $words, $value);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function getStringArray($words){
        $myArray = [
            'this example will help you {words}.',
            'step by step explain {words}.',
            'you will learn {words}.',
            'you can see {words}.',
            'I would like to share with you {words}.',
            'I would like to show you {words}.',
            'Here you will learn {words}.',
            'This tutorial will give you simple example of {words}.',
            'This article will give you simple example of {words}.',
            'This post will give you simple example of {words}.',
            'we will help you to give example of {words}.',
            "it's simple example of {words}.",
            "I explained simply about {words}.",
            "I explained simply step by step {words}.",
            "you will learn {words}.",
            "if you have question about {words} then I will give simple example with solution.",
            "if you want to see example of {words} then you are a right place.",
            "We will look at example of {words}.",
            "you'll learn {words}.",
            "you can understand a concept of {words}.",
            "let’s discuss about {words}.",
            "I’m going to show you about {words}.",
            "We will use {words}.",
            "This article goes in detailed on {words}.",
            "In this article, we will implement a {words}.",
        ];

        $randomKey = rand(0, count($myArray) - 1);

        $value = $myArray[$randomKey];

        return str_replace('{words}', $words, $value);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function getLastStringArray($words){
        $myArray = [
            "So, let's follow few step to create example of {words}.",
            "You just need to some step to done {words}.",
            "Let's see bellow example {words}.",
            "Follow bellow tutorial step of {words}.",
            "Let's get started with {words}.",
            "you will do the following things for {words}.",
            "follow bellow step for {words}.",
            "Here, Creating a basic example of {words}.",
            "Alright, let’s dive into the steps.",
        ];

        $randomKey = rand(0, count($myArray) - 1);

        $value = $myArray[$randomKey];

        return str_replace('{words}', $words, $value);
    }
    
}
