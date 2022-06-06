<?php

declare(strict_types=1);

namespace Tradebyte\Product\Model;

use SimpleXMLElement;

class Product
{
    private ?int $id = null;

    private ?string $number = null;

    private ?int $changeDate = null;

    private ?int $createdDate = null;

    private ?string $brand = null;

    /**
     * @var Article[]
     */
    private ?array $articles = null;

    private ?array $supSupplier = null;

    private ?array $activations = null;

    private ?array $name = null;

    private ?array $text = null;

    private ?array $media = null;

    private ?array $variantfields = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getChangeDate(): ?int
    {
        return $this->changeDate;
    }

    public function setChangeDate(int $changeDate): void
    {
        $this->changeDate = $changeDate;
    }

    public function getCreatedDate(): ?int
    {
        return $this->createdDate;
    }

    public function setCreatedDate(int $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return Article[]|null
     */
    public function getArticles(): ?array
    {
        return $this->articles;
    }

    /**
     * @param Article[] $articles
     */
    public function setArticles(array $articles): void
    {
        $this->articles = $articles;
    }

    public function getSupSupplier(): ?array
    {
        return $this->supSupplier;
    }

    public function setSupSupplier(array $supSupplier): void
    {
        $this->supSupplier = $supSupplier;
    }

    public function getActivations(): ?array
    {
        return $this->activations;
    }

    public function setActivations(array $activations): void
    {
        $this->activations = $activations;
    }

    public function getName(): ?array
    {
        return $this->name;
    }

    public function setName(array $name): void
    {
        $this->name = $name;
    }

    public function getText(): ?array
    {
        return $this->text;
    }

    public function setText(array $text): void
    {
        $this->text = $text;
    }

    public function getMedia(): ?array
    {
        return $this->media;
    }

    public function setMedia(array $media): void
    {
        $this->media = $media;
    }

    public function getVariantfields(): ?array
    {
        return $this->variantfields;
    }

    public function setVariantfields(array $variantfields): void
    {
        $this->variantfields = $variantfields;
    }

    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement): void
    {
        $this->setId((int)$xmlElement->P_NR);
        $this->setNumber((string)$xmlElement->P_NR_EXTERNAL);

        if (isset($xmlElement->P_SUB_SUPPLIER)) {
            $this->setSupSupplier([
                'identifier' => (string)$xmlElement->P_SUB_SUPPLIER['identifier'],
                'key' => (string)$xmlElement->P_SUB_SUPPLIER['key'],
            ]);
        }

        $this->setChangeDate((int)$xmlElement->P_CHANGEDATE);
        $this->setCreatedDate((int)$xmlElement->P_CREATEDATE);

        if (isset($xmlElement->P_ACTIVEDATA)) {
            $activations = [];

            foreach ($xmlElement->P_ACTIVEDATA->P_ACTIVE as $active) {
                $activations[(string)$active['channel']] = (int)$active;
            }

            $this->setActivations($activations);
        }

        if (isset($xmlElement->P_NAME)) {
            $name = [];

            foreach ($xmlElement->P_NAME->VALUE as $value) {
                $lang = (string)$value->xpath('@xml:lang')[0]['lang'];
                $name[$lang] = (string)$value;
            }

            $this->setName($name);
        }

        if (isset($xmlElement->P_TEXT)) {
            $text = [];

            foreach ($xmlElement->P_TEXT->VALUE as $value) {
                $lang = (string)$value->xpath('@xml:lang')[0]['lang'];
                $text[$lang] = (string)$value;
            }

            $this->setText($text);
        }

        $this->setBrand((string)$xmlElement->P_BRAND);

        if (isset($xmlElement->P_MEDIADATA)) {
            $media = [];

            foreach ($xmlElement->P_MEDIADATA->P_MEDIA as $mediaNode) {
                $media[] = [
                    'type' => (string)$mediaNode['type'],
                    'sort' => (string)$mediaNode['sort'],
                    'origname' => (string)$mediaNode['origname'],
                    'url' => (string)$mediaNode
                ];
            }

            $this->setMedia($media);
        }

        if (isset($xmlElement->P_VARIANTFIELDS)) {
            $variantfields = [];

            foreach ($xmlElement->P_VARIANTFIELDS->P_VARIANTFIELD as $variantfield) {
                $variantfields[] = [
                    'identifier' => (string)$variantfield['identifier'],
                    'key' => (string)$variantfield['key'],
                    'value' => (string)$variantfield,
                ];
            }

            $this->setVariantfields($variantfields);
        }

        if (isset($xmlElement->ARTICLEDATA)) {
            foreach ($xmlElement->ARTICLEDATA->ARTICLE as $xmlItem) {
                $article = new Article();
                $article->setId((int)$xmlItem->A_ID);
                $article->setNumber((string)$xmlItem->A_NR);

                if (isset($xmlItem->A_SUB_SUPPLIER)) {
                    $article->setSupSupplier([
                        'identifier' => (string)$xmlItem->A_SUB_SUPPLIER['identifier'],
                        'key' => (string)$xmlItem->A_SUB_SUPPLIER['key'],
                    ]);
                }

                $article->setChangeDate((int)$xmlItem->A_CHANGEDATE);
                $article->setCreatedDate((int)$xmlItem->A_CREATEDATE);
                $article->setIsActive((bool)(int)$xmlItem->A_ACTIVE);
                $article->setEan((string)$xmlItem->A_EAN);
                $article->setProdNumber((string)$xmlItem->A_PROD_NR);

                if (isset($xmlItem->A_VARIANTDATA)) {
                    $variants = [];
                    $i = 0;

                    foreach ($xmlItem->A_VARIANTDATA->A_VARIANT as $variant) {
                        $variants[$i] = [
                            'identifier' => (string)$variant['identifier'],
                            'key' => (string)$variant['key'],
                            'values' => []
                        ];

                        foreach ($variant->VALUE as $variant) {
                            $lang = (string)$variant->xpath('@xml:lang')[0]['lang'];
                            $variants[$i]['values'][$lang] = (string)$variant;
                        }

                        $i++;
                    }

                    $article->setVariants($variants);
                }

                if (isset($xmlItem->A_PRICEDATA)) {
                    $prices = [];

                    foreach ($xmlItem->A_PRICEDATA->A_PRICE as $price) {
                        $prices[(string)$price['channel']] = [
                            'currency' => (string)$price['currency'],
                            'vk' => (float)$price->A_VK,
                            'vk_old' => (float)$price->A_VK_OLD,
                            'uvp' => (float)$price->UVP,
                            'mwst' => (int)$price->A_MWST,
                            'ek' => (float)$price->A_EK,
                        ];
                    }

                    $article->setPrices($prices);
                }

                if (isset($xmlItem->A_MEDIADATA)) {
                    $media = [];

                    foreach ($xmlItem->A_MEDIADATA->A_MEDIA as $mediaNode) {
                        $media[] = [
                            'type' => (string)$mediaNode['type'],
                            'sort' => (string)$mediaNode['sort'],
                            'origname' => (string)$mediaNode['origname'],
                            'url' => (string)$mediaNode
                        ];
                    }

                    $article->setMedia($media);
                }

                $article->setUnit((string)$xmlItem->A_UNIT);
                $article->setStock((int)$xmlItem->A_STOCK);
                $article->setDeliveryTime((int)$xmlItem->A_DELIVERY_TIME);
                $article->setReplacement((int)$xmlItem->A_REPLACEMENT);
                $article->setReplacementTime((int)$xmlItem->A_REPLACEMENT_TIME);
                $article->setOrderMin((int)$xmlItem->A_ORDER_MIN);
                $article->setOrderMax((int)$xmlItem->A_ORDER_MAX);
                $article->setOrderInterval((int)$xmlItem->A_ORDER_INTERVAL);

                if (isset($xmlItem->A_PARCEL)) {
                    $article->setParcel([
                        'pieces' => (int)$xmlItem->A_PARCEL->A_PIECES,
                        'width' => (float)$xmlItem->A_PARCEL->A_WIDTH,
                        'height' => (float)$xmlItem->A_PARCEL->A_HEIGHT,
                        'length' => (float)$xmlItem->A_PARCEL->A_LENGTH,
                    ]);
                }

                $this->articles[] = $article;
            }
        }
    }

    public function getRawData(): array
    {
        $data = [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'change_date' => $this->getChangeDate(),
            'created_date' => $this->getCreatedDate(),
            'sup_supplier' => $this->getSupSupplier(),
            'activations' => $this->getActivations(),
            'name' => $this->getName(),
            'text' => $this->getText(),
            'brand' => $this->getBrand(),
            'media' => $this->getMedia(),
            'variantfields' => $this->getVariantfields(),
            'articles' => null
        ];

        $articles = $this->getArticles();

        if ($articles) {
            foreach ($articles as $article) {
                $data['articles'][] = $article->getRawData();
            }
        }

        return $data;
    }
}
