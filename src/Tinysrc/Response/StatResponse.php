<?php

namespace Tinysrc\Response;

use JMS\Serializer\Annotation as Serializer;

class StatResponse
{
    /**
     * @Serializer\SerializedName("data")
     * @Serializer\Type("array<Tinysrc\Response\StatItemResponse>")
     * @Serializer\Since("1.0.0")
     *
     * @var array
     */
    private $data;

    /**
     * @Serializer\SerializedName("total")
     * @Serializer\Type("int")
     * @Serializer\Since("1.0.0")
     *
     * @var int
     */
    private $total;

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return StatResponse
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return StatResponse
     */
    public function setTotal(int $total)
    {
        $this->total = $total;
        return $this;
    }
}
