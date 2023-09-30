<?php

namespace Omnia\MediaManager;

trait WithMediaManager
{
    public function showFileManager(string $id, ?string $file = null, array $metadata = [])
    {
        $this->dispatch('media-manager:show',
            id:$id,
            file: $file,
            metadata: $metadata,
        )->to('media-manager');
    }

    public function removeFileFromMediaManager()
    {
        $this->dispatch('media-manager:file-removed')->to('media-manager');
    }
}
