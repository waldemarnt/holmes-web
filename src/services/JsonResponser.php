<?php
namespace Services;


class JsonResponser
{
	private $status;
	private $data;


	public function response($app)
	{
		$this->data['status'] = $this->getStatusByNumber();
		return $app->json($this->data,$this->status);
	}


	protected function getStatusByNumber()
	{
		if($this->status < 310){

			return 'success';
		}

		return 'error';
	}


    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets the value of data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Sets the value of data.
     *
     * @param mixed $data the data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data['data'] = $data;

        return $this;
    }
}