<?php
declare(strict_types=1);


namespace Dpool\Base\Routing\Aspect;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Routing\Aspect\PersistedAliasMapper;
use TYPO3\CMS\Core\Site\SiteLanguageAwareTrait;
use TYPO3\CMS\Core\Routing\Aspect\PersistenceDelegate;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;


class RecordPersistedAliasMapper extends PersistedAliasMapper
{
    use SiteLanguageAwareTrait;

    /**
     * @var bool
     */
    protected $ignoreEnablefields;

    /**
     * @param array $settings
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $settings)
    {
        parent::__construct($settings);
        $ignoreEnablefields = $settings['ignoreEnablefields'] ?? false;
        $this->ignoreEnablefields = $ignoreEnablefields;
    }

    /**
     * @return PersistenceDelegate
     */
    protected function getPersistenceDelegate(): PersistenceDelegate
    {

        if ($this->persistenceDelegate !== null) {
            return $this->persistenceDelegate;
        }
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable($this->tableName)
            ->from($this->tableName);

        if ($this->ignoreEnablefields) {
            $queryBuilder
                ->getRestrictions()
                ->removeAll()
                ->add(GeneralUtility::makeInstance(DeletedRestriction::class));
        }

        $resolveModifier = function (QueryBuilder $queryBuilder, array $values) {
            return $queryBuilder->select(...$this->persistenceFieldNames)->where(
                ...$this->createFieldConstraints($queryBuilder, $values)
            );
        };
        
        $generateModifier = function (QueryBuilder $queryBuilder, array $values) {
            return $queryBuilder->select(...$this->persistenceFieldNames)->where(
                ...$this->createFieldConstraints($queryBuilder, $values)
            );
        };

        return $this->persistenceDelegate = new PersistenceDelegate(
            $queryBuilder,
            $resolveModifier,
            $generateModifier
        );

    }
}