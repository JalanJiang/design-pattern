<?php
/*
 * @Description: State Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-04 16:50:46
 * @LastEditTime: 2020-12-04 17:02:19
 */
// Context
class Document
{
    private State $state;

    public function changeState(State $state)
    {
        $this->state = $state;
    }

    public function render()
    {
        echo "Document Render...\n";
        $this->state->render();
    }

    public function publish()
    {
        echo "Document Publish...\n";
        $this->state->publish();
    }
}

// State Class
abstract class State
{
    // context
    protected Document $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function render(){}

    public function publish(){}
}

// Draft State
class Draft extends State
{   
    public function render()
    {
        echo "Begin Draft: Writing document...\n";
    }

    public function publish()
    {
        echo "Finish Draft: Sending document to admin...\n";
        // begin moderation
        $this->document->changeState(new Moderation($this->document));
    }
}

// Moderation State
class Moderation extends State
{
    public function render()
    {
        echo "Begin Moderation: ...\n";
    }

    public function publish()
    {
        echo "Finish Moderation: ...\n";
    }
}

$document = new Document();
$draftState = new Draft($document);
$document->changeState($draftState);
// draft
$document->render();
$document->publish();
// moderation
$document->render();
$document->publish();
/*Output:
Document Render...
Begin Draft: Writing document...
Document Publish...
Finish Draft: Sending document to admin...
Document Render...
Begin Moderation: ...
Document Publish...
Finish Moderation: ...
*/