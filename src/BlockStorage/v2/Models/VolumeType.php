<?php

namespace OpenStack\BlockStorage\v2\Models;

use OpenStack\Common\Resource\AbstractResource;
use OpenStack\Common\Resource\Creatable;
use OpenStack\Common\Resource\Deletable;
use OpenStack\Common\Resource\Listable;
use OpenStack\Common\Resource\Updateable;

/**
 * @property \OpenStack\BlockStorage\v2\Api $api
 */
class VolumeType extends AbstractResource implements Listable, Creatable, Updateable, Deletable
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    protected $resourceKey  = 'volume_type';
    protected $resourcesKey = 'volume_types';

    /**
     * @param array $userOptions {@see \OpenStack\BlockStorage\v2\Api::postTypes}
     *
     * @return self
     */
    public function create(array $userOptions)
    {
        $response = $this->execute($this->api->postTypes(), $userOptions);
        return $this->populateFromResponse($response);
    }

    public function update()
    {
        $this->executeWithState($this->api->putType());
    }

    public function delete()
    {
        $this->executeWithState($this->api->deleteType());
    }
}