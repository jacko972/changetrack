<?php

namespace Qafoo\ChangeTrack\Analyzer;

use Qafoo\ChangeTrack\Analyzer\Vcs\GitCheckout;

class Change
{
    /**
     * @var \Qafoo\ChangeTrack\Analyzer\Change\LocalChange
     */
    private $localChange;

    /**
     * @var string
     */
    private $revision;

    /**
     * @var string
     */
    private $message;

    /**
     * @param \Qafoo\ChangeTrack\Analyzer\Change\LocalChange $localChange
     * @param string $revision
     * @param string $message
     */
    public function __construct(Change\LocalChange $localChange, $revision, $message)
    {
        $this->localChange = $localChange;
        $this->revision = $revision;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getAffectedLine()
    {
        return $this->localChange->getAffectedLine();
    }

    /**
     * @param \Qafoo\ChangeTrack\Analyzer\Vcs\GitCheckout $checkout
     */
    public function determineAffectedArtifact(GitCheckout $checkout)
    {
        return $this->localChange->determineAffectedArtifact($checkout, $this->revision);
    }

    /**
     * @return \Qafoo\ChangeTrack\Analyzer\Change\LineChange
     */
    public function getLineChange()
    {
        return $this->localChange->getLineChange();
    }
}
