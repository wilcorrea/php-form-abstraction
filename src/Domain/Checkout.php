<?php

namespace App\Domain;

use App\Application\Schema;

/**
 * Class Checkout
 *
 * @package App\Domain
 */
class Checkout extends Schema
{
    /**
     * @inheritDoc
     */
    protected function construct(): void
    {
        $this->addPersonalFields();

        $this->addAddressFields();

        $this->addSettingsFields();

        $this->addPaymentFields();
    }


    /**
     * Fields related to customer personal infos
     *
     * @return void
     */
    protected function addPersonalFields(): void
    {
        /** @var Schema $this */
        $this->addField('firstName')
            ->setFieldLabel('First Name')
            ->isRequired();

        $this->addField('lastName')
            ->setFieldLabel('Last Name')
            ->isRequired();

        $this->addField('username')
            ->setFieldLabel('Username')
            ->setFieldPlaceholder('Username')
            ->setFieldInvalidFeedback('Your username is required.')
            ->isRequired();

        $this->addField('email', ['type' => 'email'])
            ->setFieldLabel('Last Name', '(Optional)')
            ->setFieldPlaceholder('you@example.com')
            ->setFieldInvalidFeedback('Please enter a valid email address for shipping updates.');
    }

    /**
     * Fields related to customer address
     *
     * @return void
     */
    protected function addAddressFields(): void
    {
        $this->addField('address')
            ->setFieldLabel('Address')
            ->setFieldPlaceholder('1234 Main St')
            ->setFieldInvalidFeedback('Please enter your shipping address.')
            ->isRequired();

        $this->addField('address2')
            ->setFieldLabel('Address2', '(Optional)')
            ->setFieldPlaceholder('Apartment or suite');

        $this->addField('country', ['options' => [['value' => 'us', 'label' => 'United States']]])
            ->setFieldLabel('Country')
            ->isRequired();

        $this->addField('state', ['options' => [['value' => 'ca', 'label' => 'California']]])
            ->setFieldLabel('State')
            ->setFieldInvalidFeedback('Please provide a valid state.')
            ->isRequired();

        $this->addField('zip')
            ->setFieldLabel('Zip')
            ->isRequired();
    }

    /**
     * Add fields related to settings and preferences
     *
     * @return void
     */
    protected function addSettingsFields(): void
    {
        $this->addField('sameAddress')
            ->setFieldLabel('Shipping address is the same as my billing address');

        $this->addField('saveInfo')
            ->setFieldLabel('Save this information for next time');
    }

    /**
     * Configure fields related to payment control
     *
     * @return void
     */
    protected function addPaymentFields(): void
    {
        $this->addField(
            'paymentMethod',
            [
                'value' => 'credit',
                'options' => [
                    ['value' => 'credit', 'label' => 'Credit card'],
                    ['value' => 'debit', 'label' => 'Debit card'],
                    ['value' => 'paypal', 'label' => 'PayPal'],
                ]
            ]
        );

        $this->addField('creditCardName')
            ->setFieldLabel('Name on card')
            ->setFieldInfo('Full name as displayed on card')
            ->isRequired();

        $this->addField('creditCardNumber')
            ->setFieldLabel('Credit card number')
            ->isRequired();

        $this->addField('creditCardExpiration')
            ->setFieldLabel('Expiration')
            ->isRequired();

        $this->addField('cvv')
            ->setFieldLabel('CVV')
            ->setFieldInvalidFeedback('Security code required')
            ->isRequired();
    }
}