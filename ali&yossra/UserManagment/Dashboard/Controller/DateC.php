<?php
include_once 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Config.php';    
include_once 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Model\Date.php' ;
class DateC
{
    public function addDate($date)
    {
        $sql = "INSERT INTO date (date) VALUES (:date)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $date
            ]);
            echo "<center><strong><h3>Date ajoutée avec succès!</h3></strong></center>";
        } catch (Exception $e) {
            echo 'Error adding date: ' . $e->getMessage();
        }
    }

    public function deleteDate($date)
    {
        $sql = "DELETE FROM date WHERE date = :date";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':date', $date);

        try {
            $req->execute();
            echo "<center><strong><h3>Date supprimée avec succès!</h3></strong></center>";
        } catch (Exception $e) {
            echo 'Error deleting date: ' . $e->getMessage();
        }
    }

    public function listDate()
    {
        $sql = "SELECT * FROM date";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listDatesForMonth($year, $month)
{
    $allDates = $this->listDate();
    $datesForMonth = array();
    foreach ($allDates as $date) {
        $dateMonth = date('m', strtotime($date['date']));
        $dateYear = date('Y', strtotime($date['date']));
        if ($dateYear == $year && $dateMonth == $month) {
            $datesForMonth[] = $date;
        }
    }

    return $datesForMonth;
}

    
}

?>
