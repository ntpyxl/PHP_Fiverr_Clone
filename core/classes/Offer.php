<?php

/**
 * Class for handling Offer-related operations.
 * Inherits CRUD methods from the Database class.
 */
class Offer extends Database
{

    public function createOffer($user_id, $description, $proposal_id)
    {
        $sql = "INSERT INTO offers (offeror_id, description, proposal_id) VALUES (?, ?, ?)";
        return $this->executeNonQuery($sql, [$user_id, $description, $proposal_id]);
    }

    public function getOffers($offer_id = null)
    {
        if ($offer_id) {
            $sql = "SELECT * FROM offers WHERE offer_id = ?";
            return $this->executeQuerySingle($sql, [$offer_id]);
        }
        $sql = "SELECT 
                    offers.*, fiverr_clone_users.*, 
                    offers.date_added AS offer_date_added
                FROM offers JOIN fiverr_clone_users ON 
                offers.offeror_id = fiverr_clone_users.user_id 
                ORDER BY offers.date_added DESC";
        return $this->executeQuery($sql);
    }


    public function getOffersByProposalID($proposal_id)
    {
        $sql = "SELECT 
                    offers.*, fiverr_clone_users.*, 
                    offers.date_added AS offer_date_added 
                FROM Offers 
                JOIN fiverr_clone_users ON 
                    offers.offeror_id = fiverr_clone_users.user_id
                WHERE proposal_id = ? 
                ORDER BY Offers.date_added DESC";
        return $this->executeQuery($sql, [$proposal_id]);
    }

    public function getOffersByOfferorID($offeror_id)
    {
        $sql = "SELECT
                    offers.offer_id AS offeror_user_id,
                    ou.username AS offeror_username,
                    ou.contact_number AS offeror_contact_number,
                    offers.description AS offer_description,
                    proposals.proposal_id,
                    proposals.proposer_id AS proposer_user_id,
                    pu.username AS proposer_username,
                    pu.contact_number AS proposer_contact_number,
                    category.category_name,
                    subcategory.subcategory_name,
                    proposals.description AS proposal_description,
                    proposals.image AS proposal_image,
                    proposals.min_price AS proposal_min_price,
                    proposals.max_price AS proposal_max_price,
                    proposals.date_added AS proposal_date_added,
                    offers.date_added AS offer_date_added 
                FROM Offers 
                JOIN proposals ON 
                    offers.proposal_id = proposals.proposal_id
                JOIN fiverr_clone_users ou ON 
                    offers.offeror_id = ou.user_id
                JOIN fiverr_clone_users pu ON 
                    proposals.proposer_id = pu.user_id
                LEFT JOIN category ON
                Proposals.category_id = category.category_id
                LEFT JOIN subcategory ON
                Proposals.subcategory_id = subcategory.subcategory_id
                WHERE offers.offeror_id = ? 
                ORDER BY Offers.date_added DESC";
        return $this->executeQuery($sql, [$offeror_id]);
    }

    public function updateOffer($description, $offer_id)
    {
        $sql = "UPDATE Offers SET description = ? WHERE Offer_id = ?";
        return $this->executeNonQuery($sql, [$description, $offer_id]);
    }

    /**
     * Deletes an Offer.
     * @param int $id The Offer ID to delete.
     * @return int The number of affected rows.
     */
    public function deleteOffer($id)
    {
        $sql = "DELETE FROM Offers WHERE Offer_id = ?";
        return $this->executeNonQuery($sql, [$id]);
    }
}
