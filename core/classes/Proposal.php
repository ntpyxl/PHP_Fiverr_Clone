<?php

/**
 * Class for handling Proposal-related operations.
 * Inherits CRUD methods from the Database class.
 */
class Proposal extends Database
{
    /**
     * Creates a new Proposal.
     * @param string $title The Proposal title.
     * @param int $category_id The ID of the category.
     * @param int $subcategory_id The ID of the subcategory.
     * @param string $content The Proposal content.
     * @param int $author_id The ID of the author.
     * @return int The ID of the newly created Proposal.
     */
    public function createProposal($user_id, $category_id, $subcategory_id, $description, $image, $min_price, $max_price)
    {
        $sql = "INSERT INTO Proposals (proposer_id, category_id, subcategory_id, description, image, min_price, max_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->executeNonQuery($sql, [$user_id, $category_id, $subcategory_id, $description, $image, $min_price, $max_price]);
    }

    /**
     * Retrieves Proposals from the database.
     * @param int|null $id The Proposal ID to retrieve, or null for all Proposals.
     * @return array
     */
    public function getProposals($id = null)
    {
        if ($id) {
            $sql = "SELECT 
                    Proposals.*,
                    category.category_name,
                    subcategory.subcategory_name,
                    fiverr_clone_users.*,
                    Proposals.date_added AS proposals_date_added
                    FROM Proposals
                    JOIN fiverr_clone_users ON
                    Proposals.proposer_id = fiverr_clone_users.user_id
                    LEFT JOIN category ON
                    Proposals.category_id = category.category_id
                    LEFT JOIN subcategory ON
                    Proposals.subcategory_id = subcategory.subcategory_id
                    WHERE Proposal_id = ?
                    ORDER BY Proposals.date_added DESC";
            return $this->executeQuerySingle($sql, [$id]);
        }
        $sql = "SELECT
                Proposals.*,
                category.category_name,
                subcategory.subcategory_name,
                fiverr_clone_users.*,
                Proposals.date_added AS proposals_date_added
                FROM Proposals
                JOIN fiverr_clone_users ON 
                Proposals.proposer_id = fiverr_clone_users.user_id
                LEFT JOIN category ON
                Proposals.category_id = category.category_id
                LEFT JOIN subcategory ON
                Proposals.subcategory_id = subcategory.subcategory_id
                ORDER BY Proposals.date_added DESC";
        return $this->executeQuery($sql);
    }


    public function getProposalsByUserID($user_id)
    {
        $sql = "SELECT
                Proposals.*,
                category.category_name,
                subcategory.subcategory_name,
                fiverr_clone_users.*, 
                Proposals.date_added AS proposals_date_added
                FROM Proposals JOIN fiverr_clone_users ON 
                Proposals.proposer_id = fiverr_clone_users.user_id
                LEFT JOIN category ON
                Proposals.category_id = category.category_id
                LEFT JOIN subcategory ON
                Proposals.subcategory_id = subcategory.subcategory_id
                WHERE proposals.proposer_id = ?
                ORDER BY Proposals.date_added DESC";
        return $this->executeQuery($sql, [$user_id]);
    }

    public function getProposalsByCategoryID($category_id)
    {
        $sql = "SELECT
                Proposals.*,
                category.category_name,
                subcategory.subcategory_name,
                fiverr_clone_users.*, 
                Proposals.date_added AS proposals_date_added
                FROM Proposals JOIN fiverr_clone_users ON 
                Proposals.proposer_id = fiverr_clone_users.user_id
                LEFT JOIN category ON
                Proposals.category_id = category.category_id
                LEFT JOIN subcategory ON
                Proposals.subcategory_id = subcategory.subcategory_id
                WHERE category.category_id = ?
                ORDER BY Proposals.date_added DESC";
        return $this->executeQuery($sql, [$category_id]);
    }

    public function getProposalsBySubcategoryID($subcategory_id)
    {
        $sql = "SELECT
                Proposals.*,
                category.category_name,
                subcategory.subcategory_name,
                fiverr_clone_users.*, 
                Proposals.date_added AS proposals_date_added
                FROM Proposals JOIN fiverr_clone_users ON 
                Proposals.proposer_id = fiverr_clone_users.user_id
                LEFT JOIN category ON
                Proposals.category_id = category.category_id
                LEFT JOIN subcategory ON
                Proposals.subcategory_id = subcategory.subcategory_id
                WHERE subcategory.subcategory_id = ?
                ORDER BY Proposals.date_added DESC";
        return $this->executeQuery($sql, [$subcategory_id]);
    }

    /**
     * Updates an Proposal.
     * @param int $id The Proposal ID to update.
     * @param string $description The new description.
     * @param string $content The new content.
     * @return int The number of affected rows.
     */
    public function updateProposal($category_id, $subcategory_id, $description, $min_price, $max_price, $proposal_id, $image = "")
    {
        if (!empty($image)) {
            $sql = "UPDATE Proposals SET category_id = ?, subcategory_id = ?, description = ?, image = ?, min_price = ?, max_price = ? WHERE Proposal_id = ?";
            return $this->executeNonQuery($sql, [
                $category_id,
                $subcategory_id,
                $description,
                $image,
                $min_price,
                $max_price,
                $proposal_id
            ]);
        } else {
            $sql = "UPDATE Proposals SET category_id = ?, subcategory_id = ?, description = ?, min_price = ?, max_price = ? WHERE Proposal_id = ?";
            return $this->executeNonQuery($sql, [
                $category_id,
                $subcategory_id,
                $description,
                $min_price,
                $max_price,
                $proposal_id
            ]);
        }
    }

    // TODO: This function is never used.
    public function addViewCount($proposal_id)
    {
        $sql = "UPDATE Proposals SET view_count = view_count + 1 WHERE Proposal_id = ?";
        return $this->executeNonQuery($sql, [$proposal_id]);
    }


    /**
     * Deletes an Proposal.
     * @param int $id The Proposal ID to delete.
     * @return int The number of affected rows.
     */
    public function deleteProposal($id)
    {
        $sql = "DELETE FROM Proposals WHERE Proposal_id = ?";
        return $this->executeNonQuery($sql, [$id]);
    }
}
