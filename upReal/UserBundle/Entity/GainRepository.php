<?php

namespace upReal\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GainRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GainRepository extends EntityRepository
{
	public function findAllByIdUser($id_user)
    {
	    $stmt = $this->getEntityManager()->getConnection()
	    ->prepare("SELECT gain.id_user, achievement.name 
	    	FROM upreal.gain 
	    	JOIN upreal.achievement ON gain.id_achievement = achievement.id
	    	WHERE id_user = $id_user 
	    	");
	    $stmt->execute();
	    return $stmt->fetchAll();
    }

	public function addAchievementToIdUser($id_user, $id_achievement)
    {
	    $stmt = $this->getEntityManager()->getConnection()
	    ->prepare("INSERT INTO gain (id_user, id_achievement)
	    	VALUES ($id_user, $id_achievement)
	    	");
	    $stmt->execute();
	}
}
