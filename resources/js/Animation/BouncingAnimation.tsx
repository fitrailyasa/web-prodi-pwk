import React from 'react'
import { motion, Variants } from 'framer-motion'

interface BouncingAnimationProps {
    children: React.ReactNode
    index?: number
    className?: string
}

const BouncingAnimation: React.FC<BouncingAnimationProps> = ({
    children,
    index,
    className
}) => {
    return (
        <motion.div
            key={index}
            className={className}
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{
                delay: index !== undefined ? index * 0.05 : 0.05,
                duration: 0.5 // Adjust duration if needed
            }}
        >
            {children}
        </motion.div>
    )
}

export default BouncingAnimation
