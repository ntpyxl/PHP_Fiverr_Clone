<?php
require_once 'classloader.php';

if (isset($_POST['insertNewUserBtn'])) {
	$username = htmlspecialchars(trim($_POST['username']));
	$email = htmlspecialchars(trim($_POST['email']));
	$contact_number = htmlspecialchars(trim($_POST['contact_number']));
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);
	$user_role = $_POST['role'];

	if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password && !empty($user_role))) {

		if ($password == $confirm_password) {

			if (!$userObj->usernameExists($username)) {

				if ($userObj->registerUser($username, $email, $password, $contact_number, $user_role)) {
					header("Location: ../login.php");
				} else {
					$_SESSION['message'] = "An error occured with the query!";
					$_SESSION['status'] = '400';
					header("Location: ../register.php");
				}
			} else {
				$_SESSION['message'] = $username . " as username is already taken";
				$_SESSION['status'] = '400';
				header("Location: ../register.php");
			}
		} else {
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = '400';
			header("Location: ../register.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}
}

if (isset($_POST['loginUserBtn'])) {
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	if (!empty($email) && !empty($password)) {

		if ($userObj->loginUser($email, $password)) {
			if ($_SESSION['user_role'] == "Freelancer") {
				header("Location: ../freelancer/");
			} else if ($_SESSION['user_role'] == "Client" || $_SESSION['user_role'] == "Admin") {
				header("Location: ../client/");
			}
		} else {
			$_SESSION['message'] = "Username/password invalid";
			$_SESSION['status'] = "400";
			header("Location: ../login.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../login.php");
	}
}

if (isset($_GET['logoutUserBtn'])) {
	$userObj->logout();
	header("Location: ../index.php");
}

if (isset($_POST['updateUserBtn'])) {
	$contact_number = htmlspecialchars($_POST['contact_number']);
	$bio_description = htmlspecialchars($_POST['bio_description']);
	if ($userObj->updateUser($contact_number, $bio_description, $_SESSION['user_id'])) {
		$_SESSION['status'] = "200";
		$_SESSION['message'] = "Profile updated successfully!";
		header("Location: ../profile.php");
	}
}

if (isset($_POST['insertNewProposalBtn'])) {
	$user_id = $_SESSION['user_id'];
	$category_id = $_POST['category'];
	$subcategory_id = $_POST['subcategory'];
	$description = htmlspecialchars($_POST['description']);
	$min_price = htmlspecialchars($_POST['min_price']);
	$max_price = htmlspecialchars($_POST['max_price']);

	// Get file name
	$fileName = $_FILES['image']['name'];

	// Get temporary file name
	$tempFileName = $_FILES['image']['tmp_name'];

	// Get file extension
	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

	// Generate random characters for image name
	$uniqueID = sha1(md5(rand(1, 9999999)));

	// Combine image name and file extension
	$imageName = $uniqueID . "." . $fileExtension;

	// Specify path
	// TODO: IF images/ DIR DOES NOT EXIST, IT WILL RETURN ERROR.
	$folder = "../images/" . $imageName;

	// Move file to the specified path 
	if (move_uploaded_file($tempFileName, $folder)) {
		if ($proposalObj->createProposal($user_id, $category_id, $subcategory_id, $description, $imageName, $min_price, $max_price)) {
			$_SESSION['status'] = "200";
			$_SESSION['message'] = "Proposal created successfully!";
			header("Location: ../freelancer/");
		}
	}
}

if (isset($_POST['updateProposalBtn'])) {
	$proposal_id = $_POST['proposal_id'];
	$description = htmlspecialchars($_POST['description']);
	$category_id = $_POST['category'];
	$subcategory_id = $_POST['subcategory'];
	$min_price = $_POST['min_price'];
	$max_price = $_POST['max_price'];
	if ($proposalObj->updateProposal($category_id, $subcategory_id, $description, $min_price, $max_price, $proposal_id)) {
		$_SESSION['status'] = "200";
		$_SESSION['message'] = "Proposal updated successfully!";
		header("Location: ../freelancer/freelancer_proposals.php");
	}
}

if (isset($_POST['deleteProposalBtn'])) {
	$proposal_id = $_POST['proposal_id'];
	$image = $_POST['image'];

	if ($proposalObj->deleteProposal($proposal_id)) {
		// Delete file inside images folder
		unlink("../images/" . $image);

		$_SESSION['status'] = "200";
		$_SESSION['message'] = "Proposal deleted successfully!";
		header("Location: ../freelancer/freelancer_proposals.php");
	}
}

if (isset($_POST['insertOfferBtn'])) {
	$user_id = $_SESSION['user_id'];
	$proposal_id = $_POST['proposal_id'];
	$description = htmlspecialchars($_POST['description']);

	$isAlreadyOffered = false;
	$offersInProposal = $offerObj->getOffersByProposalID($proposal_id);
	foreach ($offersInProposal as $offer) {
		if ($user_id == $offer['user_id']) {
			$isAlreadyOffered = true;
			echo "<script>
					alert('You already made an offer!');
					window.location.href = '../client/';
				</script>";
		}
	}

	if (!$isAlreadyOffered) {
		if ($offerObj->createOffer($user_id, $description, $proposal_id)) {
			header("Location: ../client/");
		}
	}
}

if (isset($_POST['updateOfferBtn'])) {
	$description = htmlspecialchars($_POST['description']);
	$offer_id = $_POST['offer_id'];
	if ($offerObj->updateOffer($description, $offer_id)) {
		$_SESSION['message'] = "Offer updated successfully!";
		$_SESSION['status'] = '200';
		header("Location: ../client/");
	}
}

if (isset($_POST['deleteOfferBtn'])) {
	$offer_id = $_POST['offer_id'];
	if ($offerObj->deleteOffer($offer_id)) {
		$_SESSION['message'] = "Offer deleted successfully!";
		$_SESSION['status'] = '200';
		header("Location: ../client/");
	}
}

if (isset($_POST['insertCategoryButton'])) {
	$category = $_POST['category'];

	if ($categoryObj->addCategory($category)) {
		$_SESSION['message'] = "Category created successfully!";
		$_SESSION['status'] = '200';
		header("Location: ../admin/manage_categories.php");
	}
}

if (isset($_POST['insertSubcategoryButton'])) {
	$parent_category_id = $_POST['parent_category_id'];
	$subcategory = $_POST['subcategory'];

	if ($categoryObj->addSubcategory($subcategory, $parent_category_id)) {
		$_SESSION['message'] = "Subcategory created successfully!";
		$_SESSION['status'] = '200';
		header("Location: ../admin/manage_categories.php");
	}
}

if (isset($_POST['refreshSubcategoryOptionsRequest'])) {
	$parent_category_id = $_POST['category_id'];

	$functionResult = $categoryObj->getSubcategoryByParentId($parent_category_id);
	foreach ($functionResult as $subcategory) {
		$subcategory_id = $subcategory['subcategory_id'];
		$subcategory_name = $subcategory['subcategory_name'];

		echo "<option value=$subcategory_id>$subcategory_name</option>";
	}
}
