<?php
namespace Conversional\MapQuest\Http;


class Location implements \JsonSerializable
{
	/** @var string $street */
	private $street;
	/** @var string $city */
	private $city;
	/** @var string $state */
	private $state;
	/** @var string $country */
	private $country;
	/** @var int $postalCode */
	private $postalCode;

	public function __construct(?string $street, ?string $city, ?string $state, ?string $country, ?int $postalCode)
	{
		$this->street = $street;
		$this->city = $city;
		$this->state = $state;
		$this->country = $country;
		$this->postalCode = $postalCode;
	}

	/**
	 * @return null|string
	 */
	public function getStreet(): ?string
	{
		return $this->street;
	}

	/**
	 * @param null|string $street
	 */
	public function setStreet(?string $street): void
	{
		$this->street = $street;
	}

	/**
	 * @return null|string
	 */
	public function getCity(): ?string
	{
		return $this->city;
	}

	/**
	 * @param string|null $city
	 */
	public function setCity(?string $city): void
	{
		$this->city = $city;
	}

	/**
	 * @return null|string
	 */
	public function getState(): ?string
	{
		return $this->state;
	}

	/**
	 * @param string|null $state
	 */
	public function setState(?string $state): void
	{
		$this->state = $state;
	}

	/**
	 * @return null|string
	 */
	public function getCountry(): ?string
	{
		return $this->country;
	}

	/**
	 * @param string|null $country
	 */
	public function setCountry(?string $country): void
	{
		$this->country = $country;
	}

	/**
	 * @return null|int
	 */
	public function getPostalCode(): ?int
	{
		return $this->postalCode;
	}

	/**
	 * @param int|null $postalCode
	 */
	public function setPostalCode(?int $postalCode): void
	{
		$this->postalCode = $postalCode;
	}

	public function jsonSerialize()
	{
		return [
			'street' => $this->street,
			'city' => $this->city,
			'state' => $this->state,
			'country' => $this->country,
			'postalCode' => $this->postalCode,
		];
	}
}