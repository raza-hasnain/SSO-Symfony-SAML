<?php
// src/AppBundle/Security/User/UserCreator.php
namespace AppBundle\Security\User;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use LightSaml\Model\Protocol\Response;
use LightSaml\SpBundle\Security\User\UserCreatorInterface;
use LightSaml\SpBundle\Security\User\UsernameMapperInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserCreator implements UserCreatorInterface
{
    /** @var ObjectManager */
    private $objectManager;

    /** @var UsernameMapperInterface */
    private $usernameMapper;

    /**
     * @param ObjectManager           $objectManager
     * @param UsernameMapperInterface $usernameMapper
     */
    public function __construct(ObjectManager $objectManager, UsernameMapperInterface$usernameMapper, $attributeMapper )
    {
        $this->objectManager = $objectManager;
        $this->usernameMapper = $usernameMapper;
        $this->attributeMapper = $attributeMapper;
    }

    /**
     * @param Response $response
     *
     * @return UserInterface|null
     */
    public function createUser(Response $response)
    {
        //echo '<pre>';
        //print_r($response);
        //echo "<br /><br />";
        $username = $this->usernameMapper->getUsername($response);
        $attributes = $this->attributeMapper->getAttributesFromResponse($response);

        //print_r($username);
		//echo $attributes['Email'][0]; 
       // print_r($attributes);
		
       // exit;
        if (array_key_exists('roles', $attributes)) {
            $roles = (is_array($attributes['roles'])) ? $attributes['roles'] : [];
        } else {
            $roles = ['ROLE_USER'];
        }
		
        $username = md5('test'.rand(100, 10000));
        $user = new User();
        $user->setUsername($username);
        $user->setRoles($roles);
        $user->setEmail($attributes['Email'][0]);
        $user->setPassword($attributes['Password'][0]);
		

        $this->objectManager->persist($user);
        $this->objectManager->flush();

        return $user;
    }
}
