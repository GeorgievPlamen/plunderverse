<?php

function parseStory($response)
{
    return $response['story'];
}

function parseActions($response)
{
    return $response['actions'];
}

function parseSaveContext($response)
{
    return $response['save-context'];
}

function parseGenerateImage($response)
{
    return $response['generateImage'];
}

function parseXpEarned($response)
{
    return $response['xp-earned'];
}

function parseWorldContext($response)
{
    return $response['world-context'];
}

function parsePlayer($worldContext)
{

    foreach ($worldContext as $context) {
        if (isset($context['item']) && $context['item'] == 'player') {
            return $context['description'];
        }
    }
}
